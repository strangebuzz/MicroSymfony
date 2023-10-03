import {Controller} from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["name", "greeting", "dialog", "form"]

    connect() {
        console.log("Hello, Stimulus!", this.element)
        // this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }

    greet() {
        if (!this.formTarget.reportValidity()) {
            return
        }

        this.greetingTarget.innerHTML = `Hello, ${this.nameTarget.value}!`
        this.dialogTarget.showModal()
    }

    reset() {
        this.nameTarget.value = ''
        this.greetingTarget.innerHTML = ''
    }
}
