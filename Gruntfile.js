module.exports = function (grunt) {
	grunt.initConfig({
		compress: {
			main: {
			  options: {
				archive: 'bb-vapor-modules-pro.zip'
			  },
			  files: [
				{src: ['readme.txt'], dest: '/', filter: 'isFile'},
				{src: ['bb-vapor-modules-pro.php'], dest: '/', filter: 'isFile'},
				{src: ['languages/**'], dest: '/'},
				{src: ['js/**'], dest: '/'},
				{src: ['includes/**'], dest: '/'},
				{src: ['img/**'], dest: '/'},
				{src: ['dist/**'], dest: '/'},
				{src: ['css/**'], dest: '/'},
				{src: ['bbvm-modules/**'], dest: '/'},
			  ]
			}
		  }
	  });
	  grunt.registerTask('default', ["compress"]);

 
 
	grunt.loadNpmTasks( 'grunt-contrib-compress' );
   
 };
