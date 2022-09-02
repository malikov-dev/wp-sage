import {domReady} from '@roots/sage/client';
import sayHi from './components/header/say-hi';
import templateDemo from './components/demo/init';

/**
 * app.main
 */
const main = async(err) => {
    if (err) {
        // handle hmr errors
        console.error(err);
    }

    // application code

    sayHi()

    if (document.body.classList.contains('page-template-tmpl-demo')) {
        templateDemo();
    }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
