/**
 * Created by depac on 19/04/2016.
 */
module.exports = function(grunt){

    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: ['web/js/jquery/jquery-2.2.0.min.js', 'web/js/bootstrap-material/bootstrap.min.js', 'web/js/bootstrap-material/material.min.js', 'web/js/bootstrap-material/ripples.min.js'],
                dest: 'web/js/app.js'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            dist: {
                files: {
                    'web/js/app.min.js': ['web/js/app.js']
                }
            }
        },
        less: {
            site: {
                files: {
                    'web/css/custom/site/css/site.css': 'web/css/custom/site/less/site.less'
                }
            },
            app: {
                files: {
                    'web/css/custom/app/css/app.css': 'web/css/custom/app/less/app.less'
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            site: {
                files: {
                    'web/css/site.min.css': ['web/css/bootstrap-material/materialize-color.css', 'web/css/bootstrap-material/bootstrap.min.css', 'web/css/bootstrap-material/bootstrap-material-design.min.css', 'web/css/bootstrap-material/ripples.min.css', 'web/css/font-awesome-4.6.1/font-awesome.min.css','web/css/custom/site/css/*.css']
                }
            },
            app: {
                files: {
                    'web/css/app.min.css': ['web/css/bootstrap-material/materialize-color.css', 'web/css/bootstrap-material/bootstrap.min.css', 'web/css/bootstrap-material/bootstrap-material-design.min.css', 'web/css/bootstrap-material/ripples.min.css', 'web/css/font-awesome-4.6.1/font-awesome.min.css','web/css/custom/app/css/*.css']
                }
            }
        },
        watch: {
            sitecss:{
                files: 'web/css/custom/site/less/site.less',
                tasks: ['less:site','cssmin:site'],
                options: {
                    spawn: false,
                },
            },
            appcss:{
                files: 'web/css/custom/app/less/app.less',
                tasks: ['less:app','cssmin:app'],
                options: {
                    spawn: false,
                },
            },
            js:{
                files: 'web/js/custom/*.js',
                tasks: ['concat','uglify'],
                options: {
                    spawn: false,
                },
            }
        },
    });

    grunt.registerTask('default', ['concat:dist','uglify:dist', 'less:development', 'cssmin:dist'])
}