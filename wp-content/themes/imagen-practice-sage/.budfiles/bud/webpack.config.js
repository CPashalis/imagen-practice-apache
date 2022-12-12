module.exports = {
  "entry": {
    "app": {
      "import": [
        "@roots/bud-client/lib/hmr/index.cjs?name=bud&bud.overlay=true&bud.indicator=true&path=/__bud/hmr",
        "@roots/bud-client/lib/proxy-click-interceptor.cjs",
        "react-refresh/runtime",
        "@scripts/app",
        "@styles/app"
      ]
    },
    "editor": {
      "import": [
        "@roots/bud-client/lib/hmr/index.cjs?name=bud&bud.overlay=true&bud.indicator=true&path=/__bud/hmr",
        "@roots/bud-client/lib/proxy-click-interceptor.cjs",
        "react-refresh/runtime",
        "@scripts/editor",
        "@styles/editor"
      ]
    }
  },
  "bail": false,
  "cache": {
    "name": "bud.development",
    "type": "filesystem",
    "version": "1mvnmilaiccg02ow5anpiuxhvwi_",
    "cacheDirectory": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/.budfiles/cache/webpack",
    "managedPaths": [
      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
    ],
    "buildDependencies": {
      "bud": [
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/package.json",
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/.editorconfig",
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/bud.config.mjs",
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/composer.json",
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/jsconfig.json",
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/tailwind.config.cjs",
        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/theme.json"
      ]
    }
  },
  "context": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage",
  "devtool": "cheap-module-source-map",
  "experiments": {
    "buildHttp": {
      "allowedUris": [
        "https://gist.githubusercontent.com/",
        "https://raw.githubusercontent.com/",
        "https://unpkg.com/",
        "https://cdn.skypack.dev/"
      ],
      "cacheLocation": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/.budfiles/bud/modules",
      "frozen": false,
      "lockfileLocation": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/.budfiles/bud/bud.lock",
      "upgrade": true
    }
  },
  "externalsType": "var",
  "infrastructureLogging": {
    "level": "none"
  },
  "mode": "development",
  "module": {
    "rules": [
      {
        "test": {},
        "exclude": [
          {}
        ],
        "parser": {
          "requireEnsure": false
        }
      },
      {
        "oneOf": [
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/style-loader/dist/cjs.js"
              },
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/css-loader/dist/cjs.js",
                "options": {
                  "importLoaders": 1,
                  "modules": false,
                  "sourceMap": true
                }
              },
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/postcss-loader/dist/cjs.js",
                "options": {
                  "sourceMap": true,
                  "postcssOptions": {
                    "plugins": [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/postcss-import/index.js",
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/nesting/index.js",
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/lib/index.js",
                      [
                        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/postcss-preset-env/dist/index.cjs",
                        {
                          "stage": 1,
                          "features": {
                            "focus-within-pseudo-class": false
                          }
                        }
                      ]
                    ]
                  }
                }
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/style-loader/dist/cjs.js"
              },
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/css-loader/dist/cjs.js",
                "options": {
                  "esModule": true,
                  "importLoaders": 1,
                  "localIdentName": "[name]__[local]___[hash:base64:5]",
                  "modules": true,
                  "sourceMap": true
                }
              },
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/postcss-loader/dist/cjs.js",
                "options": {
                  "sourceMap": true,
                  "postcssOptions": {
                    "plugins": [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/postcss-import/index.js",
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/nesting/index.js",
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/lib/index.js",
                      [
                        "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/postcss-preset-env/dist/index.cjs",
                        {
                          "stage": 1,
                          "features": {
                            "focus-within-pseudo-class": false
                          }
                        }
                      ]
                    ]
                  }
                }
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/csv-loader/index.js"
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset",
            "generator": {
              "filename": "fonts/[name][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/html-loader/dist/cjs.js"
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset/resource",
            "generator": {
              "filename": "images/[name][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/babel-loader/lib/index.js",
                "options": {
                  "cacheDirectory": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/.budfiles/cache/babel",
                  "presets": [
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/@babel/preset-env/lib/index.js"
                    ],
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/@babel/preset-react/lib/index.js"
                    ]
                  ],
                  "plugins": [
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-transform-runtime/lib/index.js",
                      {
                        "helpers": false
                      }
                    ],
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-proposal-object-rest-spread/lib/index.js"
                    ],
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-proposal-class-properties/lib/index.js"
                    ],
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-syntax-dynamic-import/lib/index.js"
                    ],
                    [
                      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/react-refresh/babel.js"
                    ]
                  ],
                  "env": {
                    "development": {
                      "compact": false
                    }
                  },
                  "root": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
                }
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "type": "json",
            "parser": {}
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset/resource",
            "generator": {
              "filename": "images/[name][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "type": "json",
            "parser": {}
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset/resource",
            "generator": {
              "filename": "images/[name][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/xml-loader/index.js"
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/yml-loader/index.js"
              }
            ]
          }
        ]
      }
    ],
    "unsafeCache": false
  },
  "name": "bud",
  "node": false,
  "output": {
    "assetModuleFilename": "[name][ext]",
    "chunkFilename": "js/dynamic/[id].js",
    "filename": "js/[name].js",
    "path": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/public",
    "publicPath": "/"
  },
  "optimization": {
    "emitOnErrors": true,
    "minimize": false,
    "minimizer": [
      "..."
    ]
  },
  "parallelism": 150,
  "performance": {
    "hints": false
  },
  "recordsPath": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/.budfiles/bud/modules.json",
  "stats": {
    "preset": "errors-warnings"
  },
  "target": "browserslist:/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/package.json",
  "plugins": [
    {
      "definitions": {
        "jQuery": "jquery",
        "$": "jquery"
      }
    },
    {
      "options": {}
    },
    {
      "patterns": [
        {
          "from": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources/images",
          "to": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/public/images/[path][name][ext]",
          "context": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources",
          "noErrorOnMissing": true,
          "toType": "template"
        }
      ],
      "options": {}
    },
    {
      "options": {
        "assetHookStage": null,
        "basePath": "",
        "fileName": "manifest.json",
        "filter": null,
        "map": null,
        "publicPath": "",
        "removeKeyHash": {},
        "sort": null,
        "transformExtensions": {},
        "useEntryKeys": false,
        "useLegacyEmit": false,
        "writeToFileEmit": true
      }
    },
    {
      "options": {
        "emitHtml": false,
        "publicPath": ""
      },
      "plugin": {
        "name": "EntrypointsManifestPlugin",
        "stage": null
      },
      "name": "entrypoints.json"
    },
    {
      "name": "WordPressExternalsWebpackPlugin",
      "stage": null,
      "externals": {
        "type": "window"
      }
    },
    {
      "plugin": {
        "name": "WordPressDependenciesWebpackPlugin",
        "stage": null
      },
      "manifest": {},
      "usedDependencies": {},
      "fileName": "wordpress.json"
    },
    {
      "plugin": {
        "name": "MergedManifestPlugin"
      },
      "file": "entrypoints.json",
      "entrypointsName": "entrypoints.json",
      "wordpressName": "wordpress.json"
    },
    {
      "options": {
        "overlay": false,
        "exclude": {},
        "include": {}
      }
    },
    {
      "resourceRegExp": {}
    },
    {
      "resourceRegExp": {}
    },
    {
      "resourceRegExp": {}
    },
    {
      "resourceRegExp": {}
    }
  ],
  "resolve": {
    "alias": {
      "@src": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources",
      "@dist": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/public",
      "@fonts": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources/fonts",
      "@images": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources/images",
      "@scripts": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources/scripts",
      "@styles": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources/styles"
    },
    "extensions": [
      ".mjs",
      ".cjs",
      ".js",
      ".jsx",
      ".css",
      ".json",
      ".wasm",
      ".yml",
      ".toml"
    ],
    "modules": [
      "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources",
      "node_modules"
    ]
  }
}