import './bootstrap';
import '../../vendor/masmerise/livewire-toaster/resources/js';
import Inputmask from 'inputmask';

document.addEventListener('DOMContentLoaded', () => {
    Inputmask().mask(document.querySelectorAll('input'));
});