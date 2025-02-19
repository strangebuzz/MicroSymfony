import '@hotwired/turbo';

declare module '@hotwired/turbo' {
    export interface TurboGlobal {
        config: {
            forms: {
                mode: 'on' | 'off' | 'optin';
            };
        };
        setFormMode(mode: 'on' | 'off' | 'optin'): void;
    }
}
