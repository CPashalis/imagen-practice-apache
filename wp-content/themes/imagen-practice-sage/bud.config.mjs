// @ts-check

/**
 * Build configuration
 *
 * @see {@link https://bud.js.org/guides/getting-started/configure}
 * @param {import('@roots/bud').Bud} app
 */
export default async (app) => {
  app
    /**
     * Application entrypoints
     */
    .entry({
      app: ["@scripts/app", "@styles/app"],
      editor: ["@scripts/editor", "@styles/editor"],
    })

    /**
     * Directory contents to be included in the compilation
     */
    .assets(["images"])
    /**
     * Add jquery
     */
     .provide({
      jquery: ["jQuery", "$"],
    })
    /**
     * Matched files trigger a page reload when modified
     */
    .watch(["resources/views/**/*", "app/**/*"])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy("http://imagen-apache.test:5111")

    /**
     * Development origin
     */
    .serve("http://localhost:5111/")

    /**
     * URI of the `public` directory
     */
    .setPublicPath("/wp-content/themes/imagen-practice-sage/public/");
};
