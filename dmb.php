<?php
/**
 * @package DMB_Lyrics
 * @version 1.0
 */
/*
Plugin Name: DMB Lyrics
Plugin URI: http://matthewjamesward.co.uk/blog/
Description: In a similar vein to the "Hello Dolly" plugin, you can get your daily fix of lyrics from Dave Matthews Band songs right up in your admin header. Currently features lyrics from the earlier years of the band's career.
Author: Matthew Ward
Version: 1.0
Author URI: http://matthewjamesward.co.uk/blog/
*/


function dmb_get_lyric() {
	
	$lyrics = "Take this needle from my vein my friend
Long before these crowded streets
Here stood my dreaming tree
Things here are not as they seem
Hike up your skirt a little more
Splish splash, me and you taking a bath
The storm outside, the fire is bright
I swear by now I'm playing time against my troubles
I'm begging slow I'm coming here
Afraid if we dance we will die
Rain in my dreams
My head won't leave my head alone
I'll see the cold in time
Why this lonely love
Your sins are washed enough
Red, blood, sand, could Dad be God?
She feels like kicking out all the windows
If all this gold, should steal my soul away
Wearing a tie like daddy speaks it
Sweet tooth tortured by the weight loss
Sometimes I feel like I'm falling
Inside a crowd, five billion proud, willing to punch it out
The treasons we are seeking
Does that screaming come from me?
Stone, stone has pulled me down
She said, a hundred times
Work ourselves, fingers to the bone
Suck the marrow, drain my soul
Seems poured from the hands of angels
Now my heart's numbered beat
What if God shuffled by?
But rushing around seems what's wrong with the world
Funny when you're small, the moon follows the car
There's no one but you see - hey, the moon is chasing me
But sometimes this the confusion grows
Until I cannot bear at it anymore
Seems to echo in this empty room
And the fear wells in me, and nothing seems good enough to stay
I play my cards, but it's by the grace of God that I play my cards at all";

	$lyrics = explode( "\n", $lyrics );
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );

}

function dmb_lyrics() {

	$chosenDMB = dmb_get_lyric();
	echo '<p id="dmb_lyrics">'.$chosenDMB.'</p>';

}

add_action('admin_notices', 'dmb_lyrics');

function dmb_lyrics_css() {
	
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
		#dmb_lyrics {
			float: $x;
			padding-$x: 15px;
			padding-top: 5px;		
			margin: 0;
			font-size: 11px;
		}
	</style>
	";

}

add_action('admin_head', 'dmb_lyrics_css');

?>
