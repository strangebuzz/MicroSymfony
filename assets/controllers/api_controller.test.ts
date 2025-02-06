import { afterAll, afterEach, beforeAll, expect, test } from 'vitest';
import userEvent from '@testing-library/user-event';
import { screen, waitFor } from '@testing-library/dom';
import { Application } from '@hotwired/stimulus';
import ApiController from './api_controller';

import { setupServer } from 'msw/node';
import { HttpResponse, http } from 'msw';

const handlers = [
    http.get('/api/slugify', () => {
        return HttpResponse.json({ slug: 'hello-world' });
    }),
];
const server = setupServer(...handlers);

function getController() {
    const div = document.createElement('div');
    div.innerHTML = `
        <p data-controller="api" data-api-url-value="/api/slugify">
            <label for="title">
                Enter a blog post title below:
                <input type="text" required="" name="title" data-api-target="title" data-action="api#slugify" id="title">
            </label>

            <label for="slug">
                Slug (readonly):
                <input readonly="" name="slug" data-api-target="slug" type="text" id="slug">
            </label>
        </p>
    `;

    return div;
}

beforeAll(() => {
    server.listen();
    const app = Application.start();
    app.register('api', ApiController);
});

afterEach(() => {
    server.resetHandlers();
    document.body.innerHTML = '';
});

afterAll(() => server.close());

test('show slug', async () => {
    const user = userEvent.setup();
    const container = getController();
    document.body.append(container);

    const title = screen.getByLabelText<HTMLInputElement>('post title', { exact: false });
    const slug = screen.getByLabelText<HTMLInputElement>('Slug', { exact: false });

    expect(slug.value).toBe('');

    await user.type(title, 'Hello World !');

    waitFor(() => {
        expect(slug.value).not.toBe('');
    });

    expect(slug.value).toBe('hello-world');
});
