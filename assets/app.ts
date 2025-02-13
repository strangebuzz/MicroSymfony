/*
 * Welcome to your app's main TypeScript file!
 *
 * This file will be included onto the page via
 *  - vite_entry_script_tags('app')
 *  - vite_entry_link_tags('app')
 * Twig functions which should already be in your base.html.twig.
 */

// app
import './bootstrap.js';

// "optin" - No turbo forms unless you insist. Use data-turbo="true" to enable turbo on individual forms.
// @see https://stackoverflow.com/a/76286583/633864
Turbo.config.forms.mode = 'optin';

console.log('This log comes from assets/app.ts - welcome to ViteBundle! 🎉');
