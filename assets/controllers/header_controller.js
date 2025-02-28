import { Controller } from '@hotwired/stimulus';

/**
 * Stimulus version of Pico minimal-theme-switcher.js (see link below).
 * In this version we don't hanlde the "auto" scheme.
 *
 * @see https://x4qtf8.csb.app/js/minimal-theme-switcher.js
 */
export default class extends Controller {
    static targets = ['lightEmoji', 'darkEmoji'];
    scheme = 'light';
    rootAttribute = 'data-theme';
    localStorageKey = 'picoPreferredColorScheme';

    connect() {
        this.scheme = this.schemeFromLocalStorage();
        this.applyScheme();
    }

    setDarkMode() {
        this.setScheme('dark');
        this.applyScheme();
    }

    setLightMode() {
        this.setScheme('light');
        this.applyScheme();
    }

    schemeFromLocalStorage() {
        return window.localStorage?.getItem(this.localStorageKey) ?? this.scheme;
    }

    setScheme(scheme) {
        this.scheme = scheme;
        this.schemeToLocalStorage();
    }

    // Apply scheme
    applyScheme() {
        document.querySelector('html')?.setAttribute(this.rootAttribute, this.scheme);
        this.schemeToUi();
    }

    // Store scheme to local storage
    schemeToLocalStorage() {
        window.localStorage?.setItem(this.localStorageKey, this.scheme);
    }

    // Show/hide theme icons depending on the current scheme
    schemeToUi() {
        this.lightEmojiTarget.style.display = this.scheme === 'dark' ? 'none' : '';
        this.darkEmojiTarget.style.display = this.scheme === 'dark' ? '' : 'none';
    }
}
