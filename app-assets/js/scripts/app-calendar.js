/*
* Calendar
*/

$(document).ready(function () {
    "use strict";
    
    /* *********************
     * Basic Calendar      *
     * *********************/


    $('#basic-calendar').fullCalendar({
        defaultView: 'month',
        editable: true,
        eventLimit: true,
        events: [
            {
                title: 'All Day Event',
                start: '2019-01-01'
            },
            {
                title: 'Long Event',
                start: '2019-01-07',
                end: '2019-01-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2019-01-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2019-01-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2019-01-11',
                end: '2019-01-13'
            },
            {
                title: 'Meeting',
                start: '2019-01-12T10:30:00',
                end: '2019-01-12T12:30:00'
            },
            {
                title: 'Dinner',
                start: '2019-01-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2019-01-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2019-01-28'
            }
        ],
    });

    /* *********************
     * Draggble Calendar      *
     * ********************/

    $('#fc-external-drag').fullCalendar({
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
        editable: true,
        droppable: true,
        dropAccept: '.fc-event',
        events: [
            {
                title: 'All Day Event',
                start: '2019-01-01'
            },
            {
                title: 'Long Event',
                start: '2019-01-07',
                end: '2019-01-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2019-01-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2019-01-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2019-01-11',
                end: '2019-01-13'
            },
            {
                title: 'Meeting',
                start: '2019-01-12T10:30:00',
                end: '2019-01-12T12:30:00'
            },
            {
                title: 'Dinner',
                start: '2019-01-12T20:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2019-01-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2019-01-28'
            }
        ],
        drop: function () {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
    })

    $('#external-events .fc-event').each(function () {

        // Different colors for events
        $(this).css({ 'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color') });

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            color: $(this).data('color'),
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });

})