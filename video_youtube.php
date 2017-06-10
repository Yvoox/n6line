<?php 

function isYoutubeVideo($text, $width, $height){
if(preg_match('/https:\/\/(www\.)*youtube\.com\/.*/',$text)){
								//echo '<p> YouTube URL found ! </p>' ; 
								/* Dû aux droits, nous sommes obligés d'utiliser la fonctionnalité embed de YouTube pour publier des vidéos */ 
								$url = $text ; 
								preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
								$id = $matches[1];
						?>
							<iframe id="ytplayer" type="text/html" width=<?php echo $width ?> height=<?php echo $height ?>
									src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
									frameborder="0" allowfullscreen></iframe> 

						<?php 
						}
						
}