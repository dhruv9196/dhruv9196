<?php
    include_once 'java-code-array.php';
    $active = "albumeditor";
    //$url = "http://www.darkempire.in/articles/" . $active;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Album Editor</title>
<meta name="description" content="Album editor for music app in mobile. You can set the album name using this java program.">
<meta name="keywords" content="Album Editor Program, Java Coding">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="../css/code_style.css" rel="stylesheet" type="text/css" media="all">
<script language='javascript'>

function rep() {
        document.body.innerHTML =
            document.body.innerHTML
            .replace(/if/g, '<span class="if">if</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/else/g, '<span class="else">else</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/try/g, '<span class="try">try</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/for/g, '<span class="for">for</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/file/g, '<span class="file">file</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/catch/g, '<span class="catch">catch</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/getName/g, '<span class="getName">getName</span>');
            document.body.innerHTML =
            document.body.innerHTML
            .replace(/println/g, '<span class="println">println</span>');
    }

</script>
<style >
#code_bg {
    background: url("./images/java_code_bg.png") center center;
    background-repeat: repeat-y;
    padding-top: 70px;
}
.else{color:red;}
.try { color:blue;}
.for { color:green;}
.file {color:purple;}
.catch { color:yellow;}
.getName { color:brown;}
.prinln { color:skyblue;}
</style>
</head>
<body>

	<?php include_once 'navbar.php';?>
	
	<div id="code_bg">
		<div class="row">
			<div class="col-lg-8 text-justify spacestyle">
				<div class="codedesc-div">
					<h4>Album Editor</h4>
    				<h6>This program edits the Album name of all the songs in a folder to
    					a given name, so that all the mp3 player automatically detects and
    					create the album with the name of your choice.</h6>
    				<h6>Using mpatric/mp3agic Github project to read Mp3 file format. Github source repository - 
    				https://github.com/mpatric/mp3agic</h6>
    				<h6>This program edits the Album name of all the songs in a folder to
    					a given name, so that all the mp3 player automatically detects and
    					create the album with the name of your choice.<br><br>
    					- Create a "output" folder</h6>
    				<h4>How to Run</h4>
    				<ol>
    					<li>Compile the java file with the below command - javac AlbumEditor.java</li>
    					<li>Run the program with the below command. You have option to
    						specify the folder location where your mp3 files are located while
    						running the java command. Or create a file "README.md" and output
    						folder at the level of src folder.</li>
    				</ol>
				</div>
				
				<pre>
<!------xxxxxxxxxxxxxx------- Actual Code STARTS ------------------xxxxx------------------------------->
import java.io.File;
import java.io.IOException;

import com.mpatric.mp3agic.ID3v2;
import com.mpatric.mp3agic.InvalidDataException;
import com.mpatric.mp3agic.Mp3File;
import com.mpatric.mp3agic.NotSupportedException;
import com.mpatric.mp3agic.UnsupportedTagException;

/**
 * - java AlbumEditor [folder] or java AlbumEditor
 * 
 * @author Amit Kumar
 * @since 14-December-2017
 */
public class AlbumEditor {

  static Integer count = 1;

  /**
   * Main function to start the program.
   * 
   * @param args - arguments if required.
   * @throws NotSupportedException - if the file format is unidentified
   * @throws IOException - error in i/o operation
   */
  public static void main(String args[]) throws NotSupportedException {
    File file;
    if (args.length == 1) {
      file = new File(args[0]);
    } else {
      File folderPath = new File("README.md");
      file = new File(
          folderPath.getAbsolutePath().substring(0, folderPath.getAbsolutePath().lastIndexOf(File.separator)));
    }
    File[] files = file.listFiles();
    try {
      for (File f : files) {
        if (f.getName().contains(".mp3")) {
          readAudioFile(f);
          count++;
        }
      }
    } catch (UnsupportedTagException | InvalidDataException | IOException e) {
      System.out.println(e.getMessage());
    }
  }

  /**
   * Reads the mp3 file and do the content setting.
   * 
   * @param f - the mp3 file
   * @throws UnsupportedTagException - if any unsupported tag found
   * @throws InvalidDataException - if any invalid data found
   * @throws IOException - error in i/o operation
   * @throws NotSupportedException - if the file format is unidentified
   */
  private static void readAudioFile(File f)
      throws UnsupportedTagException, InvalidDataException, IOException, NotSupportedException {
    Mp3File mp3file = new Mp3File(f);
    ID3v2 id3v1Tag;
    if (mp3file.hasId3v1Tag()) {
      id3v1Tag = mp3file.getId3v2Tag();
      id3v1Tag.setTrack(count.toString());
      String title = f.getName().substring(0, f.getName().lastIndexOf("."));
      id3v1Tag.setTitle(title);
      id3v1Tag.setAlbum("Punjabi");
      id3v1Tag.setComment("[http://darkempire.in/codeproject/] Modified my AlbumEditor Program.");
      mp3file.save("output/" + f.getName());
    }
  }
}
<!------xxxxxxxxxxxxxx------- Actual Code ENDS ------------------xxxxx------------------------------->
				</pre>
			</div>
			<div class="col-lg-4">
				<ul class="anchor-list">
					<?php
                        foreach ($PAGES as $key => $value) { // is defined in java-code-array.php
                            if ($key == $active) {
                                echo '<li><a class="active" href="' . $key . '">' . $value . '</a></li>';
                            } else {
                                echo '<li><a href="' . $key . '">' . $value . '</a></li>';
                            }
                        }
                    ?>
				</ul>
			</div>
		</div>
	</div>
	
	<!-- Footer -->
	<?php include_once 'footer.php';?>

  <script>
//call after page loaded
window.onload=rep ; 
</script>
</body>
</html>