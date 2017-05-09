module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourcemap: 'none'
            },
            dist: {
                files: {
                    // 'css/tna-forms.css': 'css/tna-forms.scss'
                }
            }
        },
        watch: {
            scripts: {
                // files: 'js/*.js',
                // tasks: ['concat', 'uglify']
            },
            css: {
                // files: 'css/*.scss',
                // tasks: ['sass']
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-qunit');

    // Default task(s).
    grunt.registerTask('default', ['sass', 'concat', 'uglify', 'watch', 'qunit']);

};