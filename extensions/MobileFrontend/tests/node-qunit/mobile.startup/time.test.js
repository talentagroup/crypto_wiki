var time = require( '../../../src/mobile.startup/time' );

QUnit.module( 'MobileFrontend time.js' );

QUnit.test( 'timeAgo()', function ( assert ) {
	assert.deepEqual( time.timeAgo( 40 ), {
		value: 40,
		unit: 'seconds'
	} );
	assert.deepEqual( time.timeAgo( 149 ), {
		value: 2,
		unit: 'minutes'
	} );
	assert.deepEqual( time.timeAgo( 150 ), {
		value: 3,
		unit: 'minutes'
	} );
	assert.deepEqual( time.timeAgo( 7500 ), {
		value: 2,
		unit: 'hours'
	} );
	assert.deepEqual( time.timeAgo( 90000 ), {
		value: 1,
		unit: 'days'
	} );
	assert.deepEqual( time.timeAgo( 9000000 ), {
		value: 3,
		unit: 'months'
	} );
	assert.deepEqual( time.timeAgo( 32000000 ), {
		value: 1,
		unit: 'years'
	} );
	assert.deepEqual( time.timeAgo( 102000000 ), {
		value: 3,
		unit: 'years'
	} );
} );
