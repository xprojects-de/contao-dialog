import {Application} from '@hotwired/stimulus';
import AlpdeskDialogController from './controllers/dialog-controller';

import './styles/alpdeskDialog.css'
import './images/close.svg'

const alpdeskDialogApplication = Application.start();
alpdeskDialogApplication.register('alpdeskdialog', AlpdeskDialogController);