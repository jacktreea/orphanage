/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Form Wizard Js
 */

  
$(document).ready(function(){

           

  // Toolbar extra buttons
  var btnFinish = $('<button type="submit"></button>').text('Submit')
      .addClass('btn btn-info')
  //     .on('click', function(){ alert('Finish Clicked Here'); 
  // });


   // Smart Wizard Circle
   $('#smart_wizard_circles').smartWizard({
      selected: 0,
      theme: 'circles',
      transitionEffect:'fade',
      transition: {
        animation: 'none', // Animation effect on navigation, none|fade|slideHorizontal|slideVertical|slideSwing|css(Animation CSS class also need to specify)
        speed: '400', // Animation speed. Not used if animation is 'css'
        easing: '', // Animation easing. Not supported without a jQuery easing plugin. Not used if animation is 'css'
        prefixCss: '', // Only used if animation is 'css'. Animation CSS prefix
        fwdShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on forward direction
        fwdHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on forward direction
        bckShowCss: '', // Only used if animation is 'css'. Step show Animation CSS on backward direction
        bckHideCss: '', // Only used if animation is 'css'. Step hide Animation CSS on backward direction
  },
    anchor: {
      enableNavigation: true, // Enable/Disable anchor navigation 
      enableNavigationAlways: true, // Activates all anchors clickable always
      enableDoneState: false, // Add done state on visited steps
      markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
      unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
      enableDoneStateNavigation: true // Enable/Disable the done state navigation
  },
      toolbarSettings: {
          toolbarPosition: 'bottom',
          showNextButton: true, // show/hide a Next button
          showPreviousButton: true, // show/hide a Previous button
          toolbarExtraButtons: [btnFinish]
      }
  });
});