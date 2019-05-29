require('./bootstrap');

import Noty from 'noty';

Noty.overrideDefaults({
  layout: 'topRight',
  theme: 'metroui',
  closeWith: ['click', 'button'],
  progressBar: true,
  animation: {
    open: 'noty_effects_open',
    close: 'noty_effects_close',
    container: false
  }
});

require('./feedbackForm');
