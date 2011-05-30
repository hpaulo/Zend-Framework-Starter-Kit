/* Author:


*/

/** Video Project Page **/
$.prvideo = {
    project : {
        projectID: null
    }
}

/*  Open ID Login stuff */
    var imgPath = '/img/openid/images/';

    $(document).ready(function() {
        openid.img_path = imgPath;
        openid.init('openid_identifier');
        openid.setDemoMode(false); //Stops form submission for client javascript-only test purposes

        /* Date */
    $('.datepicker').live('focus', function() {
        $(this).datepicker({
			changeMonth: true,
			changeYear: true,
                        yearRange: '1940:+1',
                        dateFormat: 'yy-mm-dd'
		});

    });
        

    });


$(function(){

    $('.update-ajax').focusout(function(){

        var id      = this.id,
            $this   = $(this),
            $value  = $this.val();
        if ($.prvideo.project[id] != $value) {
          $result = sendProjectUpdate(id, $value);
        }
    });
});


// Get the projectId for this page.
function getProjectId() {
    var $project = $.prvideo.project;
        if (null == $project.projectID) {
            $.post(
                    '/video/create/format/json',
                    null,
                    function(data) {
                        $project.projectID = data.projectId;
                    }
            );
        }
    return $project.projectID;
}

// Send updates to server
function sendProjectUpdate(el, value) {
    $.post(
            '/video/update/format/json',
            {
                projectID: $.prvideo.project.projectID,
                element: el,
                value: value
            },
            function(data){
                processProjectUpdate(el, data);
            }
    );
}

function processProjectUpdate(el, data){
    $.prvideo.project[el] = data.result;
}