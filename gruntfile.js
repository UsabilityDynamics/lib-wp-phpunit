/**
 * Library Build.
 *
 * @author peshkov@UD
 * @version 0.1.0
 * @param grunt
 */
module.exports = function build( grunt ) {

  grunt.initConfig( {

    // Read Composer File.
    composer: grunt.file.readJSON( 'composer.json' ),

    // Generate Documentation.
    yuidoc: {
      compile: {
        name: '<%= composer.name %>',
        description: '<%= composer.description %>',
        version: '<%= composer.version %>',
        url: '<%= composer.homepage %>',
        options: {
          paths: 'lib',
          outdir: 'static/codex/'
        }
      }
    },

    // Generate Markdown.
    markdown: {
      all: {
        files: [
          {
            expand: true,
            src: 'readme.md',
            dest: 'static/',
            ext: '.html'
          }
        ],
        options: {
          markdownOptions: {
            gfm: true,
            codeLines: {
              before: '<span>',
              after: '</span>'
            }
          }
        }
      }
    },

    // Clean for Development.
    clean: {
      composer: [
        "composer.lock"
      ],
      test: [
        ".test"
      ]
    },

    // CLI Commands.
    shell: {
      install: {
        options: { stdout: true },
        command: 'composer install --prefer-dist --dev --no-interaction --quiet'
      },
      update: {
        options: { stdout: true },
        command: 'composer update --prefer-source --no-interaction --quiet'
      }
    }

  });

  // Register NPM Tasks.
  grunt.registerTask( 'default', [ 'markdown' , 'yuidoc' ] );
  // Update Environment.
  grunt.registerTask( 'update', [ 'clean:update', 'shell:update' ] );

};