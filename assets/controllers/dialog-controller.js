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
        },
        storagekey: {
            type: String, default: ''
        },
        storageexpires: {
            type: Number, default: 0
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

        if (this.storage() === true) {

            const isModal = this.modalValue;
            if (isModal === true) {
                this.dialogTarget.showModal();
            } else {
                this.dialogTarget.show();
            }

        }

    }

    backdropClose(event) {

        const isModal = this.modalValue;
        if (isModal === true) {
            super.backdropClose(event);
        }

    }

    storage() {

        const delayOpen = this.opendelayValue;
        const scrolldelay = this.scrolldelayValue;

        if (delayOpen === 0 && scrolldelay === 0) {
            return true;
        }

        const storageKey = this.storagekeyValue;
        const storageExpiresHours = this.storageexpiresValue;

        if (storageKey !== '') {

            if (storageExpiresHours > 0) {

                const date = new Date();
                date.setTime(date.getTime() + (storageExpiresHours * 60 * 60 * 1000));

                const currentStorageObject = localStorage.getItem(storageKey);
                if (currentStorageObject !== null && currentStorageObject !== '') {

                    try {

                        const currentStorageValue = JSON.parse(currentStorageObject);
                        if (currentStorageValue.expires !== null && currentStorageValue.expires !== undefined && currentStorageValue.expires !== '') {

                            const now = new Date();

                            if (now.getTime() >= currentStorageValue.expires) {

                                localStorage.setItem(storageKey, JSON.stringify({
                                    expires: date.getTime()
                                }));

                                return true;
                            }

                            return false;

                        }

                    } catch (e) {
                    }

                }

                localStorage.setItem(storageKey, JSON.stringify({
                    expires: date.getTime()
                }));

                return true;

            } else {
                localStorage.removeItem(storageKey);
            }

        }

        return true;

    }

}