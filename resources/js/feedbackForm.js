import IMask from 'imask';
import Noty from 'noty';

const phoneInput = document.getElementById('phone');

if (phoneInput !== null) {
  const maskOptions = {
    mask: '+000000000000000',
  };

  IMask(phoneInput, maskOptions);

  const form = $('#feedback-form');
  const submitButton = $('#feedback-form button[type=submit]');

  form.submit(event => {
    event.preventDefault();
    clearFormDecorators(form);
    submitButton.addClass('is-loading');
    const route = event.target.action;
    $.ajax({
      url: route + '?' + form.serialize(),
      type: 'POST',
      success: function (response) {
        new Noty({
          type: 'success',
          text: response.message,
          timeout: false,
        }).show();
      },
      error: function (response) {
        const responseBody = response.responseJSON;

        for (let field in responseBody.errors) {
          $(`#${field}`).addClass('is-danger');
          $(`#${field}`).next().removeClass('is-hidden').html(responseBody.errors[field][0]);
        }

        new Noty({
          type: 'error',
          text: responseBody.message,
          timeout: false,
        }).show();
      },
      complete: () => {
        submitButton.removeClass('is-loading');
      }
    });
  });
}

function clearFormDecorators(form) {
  form.find('input').removeClass('is-danger');
  form.find('textarea').removeClass('is-danger');
  form.find('.help').addClass('is-hidden');
}
