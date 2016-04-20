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
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            dist: {
                files: {
                    'web/css/app.min.css': ['web/css/bootstrap-material/materialize-color.css', 'web/css/bootstrap-material/bootstrap.min.css', 'web/css/bootstrap-material/bootstrap-material-design.min.css', 'web/css/bootstrap-material/ripples.min.css', 'web/css/font-awesome-4.6.1/font-awesome.min.css','web/css/custom/css/*.css']
                }
            }
        },
        watch: {
            css:{
                files: 'web/css/custom/css/*.css',
                tasks: ['cssmin'],
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

    grunt.registerTask('default', ['concat:dist','uglify:dist', 'cssmin:dist'])
}