/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: '<json:package.json>',
    meta: {
      banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
        '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
        '<%= pkg.homepage ? "* " + pkg.homepage + "\n" : "" %>' +
        '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author %>;' +
        ' Licensed <%= pkg.license %> */'
    },
    lint: {
      files: ['grunt.js', 'public/js/script.js', 'tests/**/*.js']
    },
    qunit: {
      files: ['tests/**/*.html']
    },
    concat: {
      dist: {
        src: [
            'public/js/libs/jquery-1.8.0.min.js'
          , 'public/js/libs/doT.min.js'
          , 'public/js/plugins.js'
          , 'public/js/script.js'
          , 'public/js/libs/cufon-yui.js'
          , 'public/js/libs/Avenir_400-Avenir_900.font.js'
        ]
        , dest: 'public/js/<%= pkg.name %>.js'
      }
    },
    min: {
      dist: {
        src: ['<banner:meta.banner>', '<config:concat.dist.dest>'],
        dest: 'public/js/<%= pkg.name %>.min.js'
      }
    },
    watch: {
      files: '<config:lint.files>',
      tasks: 'lint qunit'
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        boss: true,
        eqnull: true,
        browser: true,
        laxcomma: true
      },
      globals: {
        jQuery: true,
        doT: true,
        HMG: true
      }
    },
    uglify: {}
  });

  // Default task.
  grunt.registerTask('default', 'lint qunit concat min');
  grunt.registerTask('dev', 'lint concat min');

};
