import Dialog from "@stimulus-components/dialog"

export default class AlpdeskDialogController extends Dialog {
    connect() {
        super.connect()
        console.log("Hello Dialog")
    }

    // Function to override on open.
    open() {
        super.open();
        console.info('Open');
    }

    // Function to override on close.
    close() {
        super.close();
        console.info('close');
    }

    // Function to override on backdropClose.
    backdropClose(event) {
        super.backdropClose(event);
        console.info('backdropClose');
    }
}