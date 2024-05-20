<?php
include('../includes/database.inc.php');

$podcast_attachment_dir = "podcast_attachments/";
$stream_attachment_dir = "stream_attachments/";

if(isset($_POST['submit_podcast'])) {
    $title = $_POST['podcast_title'];
    $tags = $_POST['podcast_tags'];
    $audio_url = isset($_POST['podcast_link_checkbox']) ? $_POST['podcast_audio_url'] : '';
    $podcast_attachment = isset($_POST['podcast_file_checkbox']) ? $_FILES['podcast_attachment']['name'] : '';

    if ($podcast_attachment != "") {
        $target_file = $podcast_attachment_dir . basename($_FILES['podcast_attachment']['name']);

        if (move_uploaded_file($_FILES['podcast_attachment']['tmp_name'], $target_file)) {
            $insert_query = "INSERT INTO podcast_audio (title, audio_url, tags, created_at) VALUES ('$title', '$audio_url', '$tags', NOW())";
            mysqli_query($con, $insert_query);
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        $insert_query = "INSERT INTO podcast_audio (title, audio_url, tags, created_at) VALUES ('$title', '$audio_url', '$tags', NOW())";
        mysqli_query($con, $insert_query);
    }
}

if(isset($_POST['submit_live_stream'])) {
    $title = $_POST['stream_title'];
    $tags = $_POST['stream_tags'];
    $stream_url = isset($_POST['stream_link_checkbox']) ? $_POST['stream_url'] : '';
    $stream_attachment = isset($_POST['stream_file_checkbox']) ? $_FILES['stream_attachment']['name'] : '';

    if ($stream_attachment != "") {
        $target_file = $stream_attachment_dir . basename($_FILES['stream_attachment']['name']);

        if (move_uploaded_file($_FILES['stream_attachment']['tmp_name'], $target_file)) {
            $insert_query = "INSERT INTO stream_videos (title, video_url, tags, created_at) VALUES ('$title', '$stream_url', '$tags', NOW())";
            mysqli_query($con, $insert_query);
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        $insert_query = "INSERT INTO stream_videos (title, video_url, tags, created_at) VALUES ('$title', '$stream_url', '$tags', NOW())";
        mysqli_query($con, $insert_query);
    }
}

if(isset($_GET['delete_podcast'])) {
    $podcast_id = $_GET['delete_podcast'];
    $delete_query = "DELETE FROM podcast_audio WHERE id = $podcast_id";
    mysqli_query($con, $delete_query);
}

if(isset($_GET['delete_live_stream'])) {
    $stream_id = $_GET['delete_live_stream'];
    $delete_query = "DELETE FROM stream_videos WHERE id = $stream_id";
    mysqli_query($con, $delete_query);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Podcasts and Live Streams</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        form {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: #FF0000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <form method="post" action="" enctype="multipart/form-data">
        <h2>Add Podcast</h2>
        <label for="podcast_title">Podcast Title:</label>
        <input type="text" name="podcast_title" required>
        <label for="podcast_tags">Podcast Tags:</label>
        <input type="text" name="podcast_tags" required>
        <input type="checkbox" id="podcast_link_checkbox" name="podcast_link_checkbox">
        <label for="podcast_link_checkbox">Provide Podcast Audio URL</label>
        <br>
        <input type="text" name="podcast_audio_url" id="podcast_audio_url" disabled>
        <br>
        <input type="checkbox" id="podcast_file_checkbox" name="podcast_file_checkbox">
        <label for="podcast_file_checkbox">Upload Podcast Attachment</label>
        <br>
        <input type="file" name="podcast_attachment" id="podcast_attachment" disabled>
        <br>
        <button type="submit" name="submit_podcast">Add Podcast</button>
    </form>

    <form method="post" action="" enctype="multipart/form-data">
        <h2>Add Live Stream</h2>
        <label for="stream_title">Live Stream Title:</label>
        <input type="text" name="stream_title" required>
        <label for="stream_tags">Live Stream Tags:</label>
        <input type="text" name="stream_tags" required>
        <input type="checkbox" id="stream_link_checkbox" name="stream_link_checkbox">
        <label for="stream_link_checkbox">Provide Stream URL</label>
        <br>
        <input type="text" name="stream_url" id="stream_url" disabled>
        <br>
        <input type="checkbox" id="stream_file_checkbox" name="stream_file_checkbox">
        <label for="stream_file_checkbox">Upload Stream Attachment</label>
        <br>
        <input type="file" name="stream_attachment" id="stream_attachment" disabled>
        <br>
        <button type="submit" name="submit_live_stream">Add Live Stream</button>
    </form>

    <h2>All Podcasts</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Audio URL</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
        <?php
        $query_podcasts = mysqli_query($con, "SELECT * FROM podcast_audio");
        while ($podcast = mysqli_fetch_assoc($query_podcasts)) {
            echo '<tr>';
            echo '<td>' . htmlentities($podcast['id']) . '</td>';
            echo '<td>' . htmlentities($podcast['title']) . '</td>';
            echo '<td>' . htmlentities($podcast['audio_url']) . '</td>';
            echo '<td>' . htmlentities($podcast['tags']) . '</td>';
            echo '<td><a href="?delete_podcast=' . htmlentities($podcast['id']) . '">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

    <h2>All Live Streams</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Stream URL</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
        <?php
        $query_streams = mysqli_query($con, "SELECT * FROM stream_videos");
        while ($stream = mysqli_fetch_assoc($query_streams)) {
            echo '<tr>';
            echo '<td>' . htmlentities($stream['id']) . '</td>';
            echo '<td>' . htmlentities($stream['title']) . '</td>';
            echo '<td>' . htmlentities($stream['video_url']) . '</td>';
            echo '<td>' . htmlentities($stream['tags']) . '</td>';
            echo '<td><a href="?delete_live_stream=' . htmlentities($stream['id']) . '">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

    <script>
        document.getElementById("podcast_link_checkbox").addEventListener("change", function() {
            document.getElementById("podcast_audio_url").disabled = !this.checked;
        });

        document.getElementById("podcast_file_checkbox").addEventListener("change", function() {
            document.getElementById("podcast_attachment").disabled = !this.checked;
        });
    </script>

    <script>
        document.getElementById("stream_link_checkbox").addEventListener("change", function() {
            document.getElementById("stream_url").disabled = !this.checked;
        });

        document.getElementById("stream_file_checkbox").addEventListener("change", function() {
            document.getElementById("stream_attachment").disabled = !this.checked;
        });
    </script>

</body>
</html>
