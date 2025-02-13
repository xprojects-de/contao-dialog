import Dialog from '@stimulus-components/dialog'

export default class AlpdeskDialogController extends Dialog {

    static values = {
        opendelay: {
            type: Number,
            default: 0
        }
    }

    connect() {
        super.connect()

        const delayOpen = this.opendelayValue;

        if (delayOpen > 0) {

            setTimeout(() => {
                this.open();
            }, delayOpen * 1000);

        }

    }

    // Function to override on open.
    open() {
        super.open();
        console.info('Open');
    }

}