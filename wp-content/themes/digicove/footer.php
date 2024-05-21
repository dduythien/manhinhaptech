<?php
	/**
	 * @package Bravisthemes
	 */
	$back_totop_on = digicove()->get_theme_opt('back_totop_on', true); ?>
</div><!-- #main -->

<?php
digicove()->footer->getFooter();	
?>
<?php do_action( 'pxl_anchor_target') ?>    
<?php if (isset($back_totop_on) && $back_totop_on) : ?>
	<a class="pxl-scroll-top" href="#">
		<svg class="pxl-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</a>
<?php endif; ?>
</div><!-- #wapper -->
<?php wp_footer(); ?>
<script id="vs" type="x-shader/x-vertex">
	#ifdef GL_ES
	precision mediump float;
	#endif

	// those are the mandatory attributes that the lib sets
	attribute vec3 aVertexPosition;
	attribute vec2 aTextureCoord;

	// those are mandatory uniforms that the lib sets and that contain our model view and projection matrix
	uniform mat4 uMVMatrix;
	uniform mat4 uPMatrix;

	uniform mat4 texture0Matrix;
	uniform mat4 texture1Matrix;
	uniform mat4 mapMatrix;

	// if you want to pass your vertex and texture coords to the fragment shader
	varying vec3 vVertexPosition;
	varying vec2 vTextureCoord0;
	varying vec2 vTextureCoord1;
	varying vec2 vTextureCoordMap;

	void main() {
		vec3 vertexPosition = aVertexPosition;

		gl_Position = uPMatrix * uMVMatrix * vec4(vertexPosition, 1.0);

		// set the varyings
		vTextureCoord0 = (texture0Matrix * vec4(aTextureCoord, 0., 1.)).xy;
		vTextureCoord1 = (texture1Matrix * vec4(aTextureCoord, 0., 1.)).xy;
		vTextureCoordMap = (mapMatrix * vec4(aTextureCoord, 0., 1.)).xy;
		vVertexPosition = vertexPosition;
	}
</script>
<script id="fs" type="x-shader/x-fragment">
	#ifdef GL_ES
	precision mediump float;
	#endif

	#define PI2 6.28318530718
	#define PI 3.14159265359
	#define S(a,b,n) smoothstep(a,b,n)

	uniform float uTime;
	uniform float uProgress;
	uniform vec2 uReso;
	uniform vec2 uMouse;

	varying vec3 vVertexPosition;
	varying vec2 vTextureCoord0;
	varying vec2 vTextureCoord1;
	varying vec2 vTextureCoordMap;


	uniform sampler2D texture0;
	uniform sampler2D texture1;
	uniform sampler2D map;

	float exponentialEasing (float x, float a){

		float epsilon = 0.00001;
		float min_param_a = 0.0 + epsilon;
		float max_param_a = 1.0 - epsilon;
		a = max(min_param_a, min(max_param_a, a));

		if (a < 0.5){
			a = 2.0 * a;
			float y = pow(x, a);
			return y;
		} else {
			a = 2.0 * (a-0.5);
			float y = pow(x, 1.0 / (1.-a));
			return y;
		}
	}

	vec4 blur13(sampler2D image, vec2 uv, vec2 resolution, vec2 direction) {
		vec4 color = vec4(0.0);
		vec2 off1 = vec2(1.411764705882353) * direction;
		vec2 off2 = vec2(3.2941176470588234) * direction;
		vec2 off3 = vec2(5.176470588235294) * direction;
		color += texture2D(image, uv) * 0.1964825501511404;
		color += texture2D(image, uv + (off1 / resolution)) * 0.2969069646728344;
		color += texture2D(image, uv - (off1 / resolution)) * 0.2969069646728344;
		color += texture2D(image, uv + (off2 / resolution)) * 0.09447039785044732;
		color += texture2D(image, uv - (off2 / resolution)) * 0.09447039785044732;
		color += texture2D(image, uv + (off3 / resolution)) * 0.010381362401148057;
		color += texture2D(image, uv - (off3 / resolution)) * 0.010381362401148057;
		return color;
	}

	void main(){
		vec2 uv0 = vTextureCoord0;
		vec2 uv1 = vTextureCoord1;

		float progress0 = uProgress;
		float progress1 = 1. - uProgress;

		vec4 map = blur13(map, vTextureCoordMap, uReso, vec2(2.)) + 0.5;

		uv0.x += progress0 * map.r;
		uv1.x -= progress1 * map.r;

		vec4 color = texture2D( texture0, uv0 );
		vec4 color1 = texture2D( texture1, uv1 );

		gl_FragColor = mix(color, color1, progress0 );
	}
</script>
</body>
</html>