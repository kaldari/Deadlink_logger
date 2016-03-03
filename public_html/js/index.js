// Get context with jQuery - using jQuery's .get() method.
function displayChart( fixed, fvalues, nvalues, totalf, totalp ) {
	// console.log( keys, values );
	var ctx = $( '#bot-chart' ).get( 0 ).getContext( '2d' );
	var data = {
		labels: fixed,
		datasets: [
			{
				label: "Links fixed",
				fillColor: "rgba(0, 0, 0, 0)",
				strokeColor: "#b47ec8",
				pointColor: "#7f4096",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#b47ec8",
				data: fvalues
			},
			{
				label: "Links not fixed",
				fillColor: "rgba(0, 0, 0, 0)",
				strokeColor: "#ef9048",
				pointColor: "#b75810",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "#b75810",
				data: nvalues
			}
		]
	};

	var myLineChart = new Chart( ctx ).Line( data );
	$( '#legend' ).html( myLineChart.generateLegend() + '<ul><li>Pages fixed: <span background="#dcdcdc">' + totalf + '</span></li><li> Pages processed: ' + totalp + '</li></ul>');
}

