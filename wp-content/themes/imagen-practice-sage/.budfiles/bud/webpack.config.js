module.exports = {
  "entry": {
    "app": {
      "import": [
        "@scripts/app",
        "@styles/app"
      ]
    },
    "editor": {
      "import": [
        "@scripts/editor",
        "@styles/editor"
      ]
    }
  },
  "bail": true,
  "cache": {
    "name": "bud.production",
    "type": "filesystem",
    "version": "cunizgflbvqfzmn9867i_3mp2l8_",
    "cacheDirectory": "/var/www/html/wp-content/themes/imagen-practice-sage/.budfiles/cache/webpack",
    "managedPaths": [
      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
    ],
    "buildDependencies": {
      "bud": [
        "/var/www/html/wp-content/themes/imagen-practice-sage/package.json",
        "/var/www/html/wp-content/themes/imagen-practice-sage/.editorconfig",
        "/var/www/html/wp-content/themes/imagen-practice-sage/bud.config.mjs",
        "/var/www/html/wp-content/themes/imagen-practice-sage/composer.json",
        "/var/www/html/wp-content/themes/imagen-practice-sage/jsconfig.json",
        "/var/www/html/wp-content/themes/imagen-practice-sage/tailwind.config.cjs",
        "/var/www/html/wp-content/themes/imagen-practice-sage/theme.json"
      ]
    }
  },
  "context": "/var/www/html/wp-content/themes/imagen-practice-sage",
  "experiments": {
    "buildHttp": {
      "allowedUris": [
        "https://gist.githubusercontent.com/",
        "https://raw.githubusercontent.com/",
        "https://unpkg.com/",
        "https://cdn.skypack.dev/"
      ],
      "cacheLocation": "/var/www/html/wp-content/themes/imagen-practice-sage/.budfiles/bud/modules",
      "frozen": false,
      "lockfileLocation": "/var/www/html/wp-content/themes/imagen-practice-sage/.budfiles/bud/bud.lock",
      "upgrade": true
    }
  },
  "externalsType": "var",
  "infrastructureLogging": {
    "level": "none"
  },
  "mode": "production",
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
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/mini-css-extract-plugin/dist/loader.js",
                "options": {
                  "publicPath": "/wp-content/themes/imagen-practice-sage/public/"
                }
              },
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/css-loader/dist/cjs.js",
                "options": {
                  "importLoaders": 1,
                  "modules": false,
                  "sourceMap": false
                }
              },
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/postcss-loader/dist/cjs.js",
                "options": {
                  "sourceMap": true,
                  "postcssOptions": {
                    "plugins": [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/postcss-import/index.js",
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/nesting/index.js",
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/lib/index.js",
                      [
                        "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/postcss-preset-env/dist/index.cjs",
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
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/mini-css-extract-plugin/dist/loader.js",
                "options": {
                  "publicPath": "/wp-content/themes/imagen-practice-sage/public/"
                }
              },
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/css-loader/dist/cjs.js",
                "options": {
                  "esModule": true,
                  "importLoaders": 1,
                  "localIdentName": "[name]__[local]___[hash:base64:5]",
                  "modules": true,
                  "sourceMap": false
                }
              },
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/postcss-loader/dist/cjs.js",
                "options": {
                  "sourceMap": true,
                  "postcssOptions": {
                    "plugins": [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/postcss-import/index.js",
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/nesting/index.js",
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/tailwindcss/lib/index.js",
                      [
                        "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/postcss-preset-env/dist/index.cjs",
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
              "/var/www/html/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/csv-loader/index.js"
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset",
            "generator": {
              "filename": "fonts/[name].[contenthash:6][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/html-loader/dist/cjs.js"
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset/resource",
            "generator": {
              "filename": "images/[name].[contenthash:6][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/babel-loader/lib/index.js",
                "options": {
                  "cacheDirectory": "/var/www/html/wp-content/themes/imagen-practice-sage/.budfiles/cache/babel",
                  "presets": [
                    [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/@babel/preset-env/lib/index.js"
                    ],
                    [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/@babel/preset-react/lib/index.js"
                    ]
                  ],
                  "plugins": [
                    [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-transform-runtime/lib/index.js",
                      {
                        "helpers": false
                      }
                    ],
                    [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-proposal-object-rest-spread/lib/index.js"
                    ],
                    [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-proposal-class-properties/lib/index.js"
                    ],
                    [
                      "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/@babel/plugin-syntax-dynamic-import/lib/index.js"
                    ]
                  ],
                  "env": {
                    "development": {
                      "compact": false
                    }
                  },
                  "root": "/var/www/html/wp-content/themes/imagen-practice-sage"
                }
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "type": "json",
            "parser": {}
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset/resource",
            "generator": {
              "filename": "images/[name].[contenthash:6][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "type": "json",
            "parser": {}
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/resources"
            ],
            "type": "asset/resource",
            "generator": {
              "filename": "images/[name].[contenthash:6][ext]"
            }
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/xml-loader/index.js"
              }
            ]
          },
          {
            "test": {},
            "include": [
              "/var/www/html/wp-content/themes/imagen-practice-sage"
            ],
            "exclude": [
              "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules"
            ],
            "use": [
              {
                "loader": "/var/www/html/wp-content/themes/imagen-practice-sage/node_modules/yml-loader/index.js"
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
    "assetModuleFilename": "[name].[contenthash:6][ext]",
    "chunkFilename": "js/dynamic/[id].js",
    "filename": "js/[name].[contenthash:6].js",
    "path": "/var/www/html/wp-content/themes/imagen-practice-sage/public",
    "publicPath": "/wp-content/themes/imagen-practice-sage/public/"
  },
  "optimization": {
    "emitOnErrors": false,
    "minimize": true,
    "minimizer": [
      "...",
      {
        "options": {
          "test": {},
          "parallel": true,
          "minimizer": {
            "options": {
              "preset": [
                "default",
                {
                  "discardComments": {
                    "removeAll": true
                  }
                }
              ]
            }
          }
        }
      },
      {
        "options": {
          "test": {},
          "extractComments": false,
          "parallel": true,
          "include": {},
          "exclude": {},
          "minimizer": {
            "options": {
              "compress": false,
              "mangle": {
                "safari10": true
              },
              "output": {
                "comments": false,
                "ascii_only": true,
                "preamble": "/**\n  * Minified by @roots/bud\n  */"
              }
            }
          }
        }
      }
    ],
    "runtimeChunk": "single",
    "splitChunks": {
      "chunks": "all",
      "automaticNameDelimiter": "/",
      "minSize": 0,
      "cacheGroups": {
        "vendor": {
          "idHint": "vendor",
          "filename": "js/bundle/vendor/[name].js",
          "test": {},
          "priority": -20
        }
      }
    }
  },
  "parallelism": 150,
  "performance": {
    "hints": false
  },
  "recordsPath": "/var/www/html/wp-content/themes/imagen-practice-sage/.budfiles/bud/modules.json",
  "stats": {
    "preset": "errors-warnings"
  },
  "target": "browserslist:/var/www/html/wp-content/themes/imagen-practice-sage/package.json",
  "plugins": [
    {
      "definitions": {
        "jQuery": "jquery",
        "$": "jquery"
      }
    },
    {
      "dangerouslyAllowCleanPatternsOutsideProject": false,
      "dry": false,
      "verbose": false,
      "cleanStaleWebpackAssets": true,
      "protectWebpackAssets": true,
      "cleanAfterEveryBuildPatterns": [],
      "cleanOnceBeforeBuildPatterns": [
        "**/*"
      ],
      "currentAssets": [],
      "initialClean": false,
      "outputPath": ""
    },
    {
      "patterns": [
        {
          "from": "/var/www/html/wp-content/themes/imagen-practice-sage/resources/images",
          "to": "/var/www/html/wp-content/themes/imagen-practice-sage/public/images/[path][name].[contenthash:6][ext]",
          "context": "/var/www/html/wp-content/themes/imagen-practice-sage/resources",
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
      "_sortedModulesCache": {},
      "options": {
        "filename": "css/[name].[contenthash:6].css",
        "ignoreOrder": false,
        "runtime": true,
        "chunkFilename": "css/[name].[contenthash:6].css"
      },
      "runtimeOptions": {
        "linkType": "text/css"
      }
    },
    {
      "options": {
        "enabled": true,
        "verbose": false,
        "extensions": {},
        "ignore": [],
        "remove": {}
      },
      "enabled": true,
      "verbose": false
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
      "@src": "/var/www/html/wp-content/themes/imagen-practice-sage/resources",
      "@dist": "/var/www/html/wp-content/themes/imagen-practice-sage/public",
      "@fonts": "/var/www/html/wp-content/themes/imagen-practice-sage/resources/fonts",
      "@images": "/var/www/html/wp-content/themes/imagen-practice-sage/resources/images",
      "@scripts": "/var/www/html/wp-content/themes/imagen-practice-sage/resources/scripts",
      "@styles": "/var/www/html/wp-content/themes/imagen-practice-sage/resources/styles"
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
      "/var/www/html/wp-content/themes/imagen-practice-sage/resources",
      "node_modules"
    ]
  }
}