import { Controller } from '@hotwired/stimulus';

export default class extends Controller<HTMLElement> {
    declare readonly titleTarget: HTMLInputElement;
    declare readonly slugTarget: HTMLInputElement;
    static targets = ['title', 'slug'];

    declare urlValue: string;
    static values = {
        url: String,
    };

    connect() {
        console.log('Dataset: ', this.element.dataset); // list all data properties of the controller
    }

    slugify() {
        const apiUrl = this.urlValue + '?title=' + this.titleTarget.value;
        const slugTarget = this.slugTarget;
        fetch(apiUrl)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                slugTarget.value = data.slug;
            })
            .catch(function (error) {
                console.log('An error occured. 😞', error);
            });
    }
}
