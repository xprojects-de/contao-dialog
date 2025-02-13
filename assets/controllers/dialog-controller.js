import Dialog from '@stimulus-components/dialog'

export default class AlpdeskDialogController extends Dialog {

    static values = {
        opendelay: {
            type: Number, default: 0
        },
        scrolldelay: {
            type: Number, default: 0
        },
        modal: {
            type: Boolean, default: true
        }
    }

    connect() {
        super.connect()

        const delayOpen = this.opendelayValue;
        const scrolldelay = this.scrolldelayValue;

        if (delayOpen > 0) {

            setTimeout(() => {
                this.open();
            }, delayOpen * 1000);

        } else if (scrolldelay > 0) {

            let dialogOpened = false;

            window.addEventListener('scroll', () => {

                const scrollPercent = 100 * window.scrollY / (document.body.scrollHeight - window.innerHeight);

                if (!dialogOpened && scrollPercent > scrolldelay) {

                    dialogOpened = true;
                    this.open();

                }

            });

        }

    }

    open() {

        const isModal = this.modalValue;
        if (isModal === true) {
            this.dialogTarget.showModal();
        } else {
            this.dialogTarget.show();
        }

    }

    backdropClose(event) {

        const isModal = this.modalValue;
        if (isModal === true) {
            super.backdropClose(event);
        }

    }

}