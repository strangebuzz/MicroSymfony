import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['title', 'slug'];
    static values = {
        url: String,
    };

    connect() {
        console.log('Dataset: ', this.element.dataset); // list all data properties of the controller
    }

    slugify() {
        // https://developer.mozilla.org/fr/docs/Web/API/URL
        const apiUrl = new URL(this.urlValue, window.location.href);
        apiUrl.searchParams.set('title', this.titleTarget.value);
        const slugTarget = this.slugTarget;
        fetch(apiUrl.toString())
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
