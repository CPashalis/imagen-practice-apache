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
    "version": "sqcruhspiilt9iyfhtqphlfbc4m_",
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
              "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources"
            ],
            "use": [
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/mini-css-extract-plugin/dist/loader.js",
                "options": {
                  "publicPath": "/wp-content/themes/imagen-practice-sage/public/"
                }
              },
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/css-loader/dist/cjs.js",
                "options": {
                  "importLoaders": 1,
                  "modules": false,
                  "sourceMap": false
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
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/mini-css-extract-plugin/dist/loader.js",
                "options": {
                  "publicPath": "/wp-content/themes/imagen-practice-sage/public/"
                }
              },
              {
                "loader": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/node_modules/css-loader/dist/cjs.js",
                "options": {
                  "esModule": true,
                  "importLoaders": 1,
                  "localIdentName": "[name]__[local]___[hash:base64:5]",
                  "modules": true,
                  "sourceMap": false
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
              "filename": "fonts/[name].[contenthash:6][ext]"
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
              "filename": "images/[name].[contenthash:6][ext]"
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
              "filename": "images/[name].[contenthash:6][ext]"
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
              "filename": "images/[name].[contenthash:6][ext]"
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
    "assetModuleFilename": "[name].[contenthash:6][ext]",
    "chunkFilename": "js/dynamic/[id].js",
    "filename": "js/[name].[contenthash:6].js",
    "path": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/public",
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
          "from": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/resources/images",
          "to": "/home/chrisp/imagen-practice-apache/wp-content/themes/imagen-practice-sage/public/images/[path][name].[contenthash:6][ext]",
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