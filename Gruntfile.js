module.exports = function(grunt) {

    // Project Configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        imagemin: {
            static: {
                options: {
                    optimizationLevel: 3
                },
                files: {
                    'dist/art.jpg': 'src/art.jpg',
                    'dist/beach_bnw.jpg': 'src/beach_bnw.jpg',
                    'dist/bungalow.jpg': 'src/bungalow.jpg',
                    'dist/family_1.jpg': 'src/family_1.jpg',
                    'dist/family_2.jpg': 'src/family_2.jpg',
                    'dist/beach_2.jpg': 'src/beach_2.jpg',
                    'dist/beach.jpg': 'src/beach.jpg',
                    'dist/eiffel.jpg': 'src/eiffel.jpg',
                    'dist/football.jpg': 'src/football.jpg',
                    'dist/seaside.jpg': 'src/seaside.jpg',
                    'dist/snow.jpg': 'src/snow.jpg',
                    'dist/trees.jpg': 'src/trees.jpg',
                    'dist/wedding.jpg': 'src/wedding.jpg',
                    'dist/whitewater.jpg': 'src/whitewater.jpg'
                }
            },
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'src/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'dist/'
                }]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask('default', ['imagemin']);

};
    
