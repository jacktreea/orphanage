<?=$msg?>
<table class="crm_Table" width="100%">
    <tr>
        <th>Current Version</th>
        <td><?=formatN(RMS_VERSION)?></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan=2>

            <span id="first">Checking for updates <br /><img src="images/update.gif" width="200px" /> <br /></span>

            <span id="version"></span><br />
            <span id="downloading"></span><br />
            <span id="update"></span><br />
            <span id="updateMsg"></span><br />
        </td>
    </tr>
</table>


<script>
$(function() {

    $.get("?module=update&action=checkUpdates&format=json", null, function(d) {
        CC = eval(d);
        if (CC[0].found) {

            $("#version").html('New Update Found v' + CC[0].updateVersion +
                '<br/><a href="#" onclick="downloadUpdate(' + CC[0].updateVersion +
                ')">Download Update</a>');
        } else if (CC[0].server == 'down') $("#version").html(
            'Update server unreachable at this time. Please check your internet conenction or contact Power Computers'
        );
        else $("#version").html('No update available at this time');

        $("#first").html('');
    });

})


function downloadUpdate(updateVersion) {

    $("#downloading").html('Downloading update<br/><img src="images/downloading.gif" width="200px"/>');

    $.get("?module=update&action=downloadUpdate&format=json&version=" + updateVersion, null, function(d) {
        CC = eval(d);
        if (CC[0].downloaded) {
            $("#version").hide();
            $("#downloading").html('Update downloaded and saved!<br/><a href="#" onclick="installUpdate(' + CC[
                0].version + ')">Install Update</a>');
        }


    });

}


function installUpdate(version) {

    $("#downloading").html('<img src="images/installing.png" widht="200px"/>');
    $.get("?module=update&action=installUpdate&format=json&version=" + version, null, function(d) {
        CC = eval(d);
        if (CC[0].updated) {
            $("#downloading").html('');
            $("#update").html('PowerRMS updated to v' + CC[0].version);
            $("#updateMsg").html('<ul>' + CC[0].msg + '</ul>');
        }


    });


}
</script>
