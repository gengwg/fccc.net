// Define global variables
var SEARCHANY     = 1;
var SEARCHALL     = 2;
var SEARCHURL     = 4;
var searchType  = '';
var showMatches   = 20000;
var currentMatch  = 0;
var copyArray   = new Array();
var docObj      = parent.main.document;
var nowbook = 39;
var nowchapter = 0;
var findbook = new Array();
var findchapter = new Array();

function readchapter(bnum, cnum) {
  docObj.open();
  docObj.writeln('<HTML>\n<HEAD>\n<TITLE>Search Results</TITLE>\n' +
  '<meta http-equiv="Content-Type" content="text/html; charset=big5">\n</HEAD>' +
    '<BODY BGCOLOR=white TEXT=BLACK>');
//  docObj.writeln('bnum = ' + bnum + ' cnum = ' + cnum);
  if((bnum - 0 < 0) || (bnum - 0 >= 66))
    bnum = 0;
  if((bnum - 0 <= 0) && (cnum - 0 < 0))
    cnum = 0;
  if((bnum - 0 >= 65) && (cnum - 0 >=22))
    cnum = 21;
  if(cnum - 0 < 0) {
      bnum--;
      cnum = book_chapters[bnum+1] - book_chapters[bnum]-1;
  }
  if(cnum - 0 >= book_chapters[bnum+1] - book_chapters[bnum]) {
      bnum++;
      cnum = 0;
  }
  var line1 = chapter_lines[book_chapters[bnum]+cnum];  
  var line2 = chapter_lines[book_chapters[bnum]+cnum+1];
//  docObj.writeln('nowbook = ' + parent.frames[0].nowchapter + ' nowchapter = ' + parent.command.nowchapter);

  docObj.write('<font size="5" color="ff0000">' + books[bnum] + '第' + numbers[cnum] + '章</font>');
  docObj.writeln('<ol>');
  for (var i = line1; i < line2; i++) {
      var oneline = profiles[i].substring(profiles[i].indexOf(" "), profiles[i].length);
      docObj.writeln('\t<li>' + oneline + '</li>\n');
      }
  docObj.writeln('</ol>');
//  docObj.writeln('<a href="#" onClick="parent.command.readchapter(parent.command.nowbook,--parent.command.nowchapter); return false;">前一章</a>');
//  docObj.writeln('<a href="#" onClick="parent.command.readchapter(parent.command.nowbook,++parent.command.nowchapter); return false;">後一章</a>');
  docObj.writeln('\n</BODY>\n</HTML>');
  docObj.close();
  nowbook = bnum;
  nowchapter = cnum;
}


// Determine the type of search, and make
// sure the user has entered something
function validate(entry) {
  if (entry.charAt(0) == "+") {
    entry = entry.substring(1,entry.length);
    searchType = SEARCHALL;
    }
  else if (entry.substring(0,4) == "url:") {
    entry = entry.substring(5,entry.length);
    searchType = SEARCHURL;
    }
  else { searchType = SEARCHANY; }
  while (entry.charAt(0) == ' ') {
    entry = entry.substring(1,entry.length);
    document.search.query.value = entry;
    }
  while (entry.charAt(entry.length - 1) == ' ') {
    entry = entry.substring(0,entry.length - 1);
    document.search.query.value = entry;
    }
/*  if (entry.length < 3) {
    alert("You cannot search strings that small. Elaborate a little.");
    document.search.query.focus();
    return;
    }
*/  convertString(entry);
  }

// Put the search terms in an array and
// and call appropriate search algorithm
function convertString(reentry) {
  var searchArray = reentry.split(" ");
  if (searchType == (SEARCHANY | SEARCHALL)) { requireAll(searchArray); }
  else { allowAny(searchArray); }
  }

// Define a function to perform a search that requires
// a match of any of the terms the user provided
function allowAny(t) {
  var findings = new Array(0);

  nowbook = 0;
  nowchapter = 0;
  for (i = 0; i < profiles.length; i++) {
    var oneline = profiles[i];
    var ok = false;
    var compareElement  = profiles[i].toUpperCase();
    if(searchType == SEARCHANY) { var refineElement  = compareElement.substring(0,compareElement.indexOf('|HTTP')); }
    else { var refineElement = compareElement.substring(compareElement.indexOf('|HTTP'), compareElement.length); }
    for (j = 0; j < t.length; j++) {
      var compareString = t[j];
      var temp = "";

//      if (profiles[i].indexOf(document.search.query.value) != -1) {
      if (compareElement.indexOf(compareString) != -1) {
      	ok = true;
        while(chapter_lines[book_chapters[nowbook]+nowchapter+1] < i) {
       	  nowchapter++;
          if(nowchapter + book_chapters[nowbook] > book_chapters[nowbook+1]) {
      	    nowchapter = 0;
      	    nowbook++;
          }
        }
        findbook[findings.length] = nowbook;
        findchapter[findings.length] = nowchapter;

        while(oneline.indexOf(compareString) != -1) {
          temp += oneline.substring(0, oneline.indexOf(compareString)) + 
            '<font color="ff0000">' + compareString + '</font>';
        
          oneline = oneline.substring(oneline.indexOf(compareString)+compareString.length, oneline.length);
        }
        temp += oneline;
        oneline = temp;
//        findings[findings.length] = profiles[i];
//        break;
        }
      }
      if(ok)
        findings[findings.length] = oneline;
    }
  verifyManage(findings);
  }

// Define a function to perform a search that requires
// a match of all terms the user provided
function requireAll(t) {
  var findings = new Array();
  var k = 0;

  nowbook = 0;
  nowchapter = 0;
  for (i = 0; i < profiles.length; i++) {
    var allConfirmation = true;
    var allString       = profiles[i];
    var refineAllString = allString.substring(0,allString.indexOf(' '));
    for (j = 0; j < t.length; j++) {
      var allElement = t[j];
      if (refineAllString.indexOf(allElement) == -1) {
        allConfirmation = false;
        continue;
        }
      }
    if (allConfirmation) {
      while(chapter_lines[book_chapters[nowbook]+nowchapter+1] < i) {
      	nowchapter++;
      	if(nowchapter + book_chapters[nowbook] > book_chapters[nowbook+1]) {
      	  nowchapter = 0;
      	  nowbook++;
      	}
      }
      findbook[k] = nowbook;
      findchapter[k++] = nowchapter;
      findings[findings.length] = profiles[i];
//      docObj.writeln('k = ' + k + ' findbook[k] = ' + findbook[k] + 'findchapter[k] = ' + findchapter[k] + 
//      'findings[findings.length] = ' + findings[findings.length-1] + ' <br />\n');
      }
    }
  verifyManage(findings);
  }

// Determine whether the search was successful
// If so print the results; if not, indicate that, too
function verifyManage(resultSet) {
  if (resultSet.length == 0) { noMatch(); }
  else {
    copyArray = resultSet;
    formatResults(copyArray, currentMatch, showMatches);
    }
  }

// Define a function that indicates that the returned no results
function noMatch() {
  docObj.open();
  docObj.writeln('<HTML><HEAD>' + 
    '<meta http-equiv="Content-Type" content="text/html; charset=big5">' +
    '<TITLE>Search Results</TITLE></HEAD>' +
    '<BODY BGCOLOR=white TEXT=BLACK>' +
//    profiles[0] +
    '<TABLE WIDTH=90% BORDER=0 ALIGN=CENTER><TR><TD VALIGN=TOP><FONT FACE=Arial><B><DL>' +
    '<HR NOSHADE WIDTH=100%>"' + document.search.query.value +
    '" returned no results.<HR NOSHADE WIDTH=100%></TD></TR></TABLE></BODY></HTML>');
  docObj.close();
  document.search.query.select();
  }

// Define a function to print the results of a successful search
function formatResults(results, reference, offset) {
  var currentRecord = (results.length < reference + offset ? results.length : reference + offset);

  docObj.open();
  docObj.writeln('<HTML>\n<HEAD>\n<TITLE>Search Results</TITLE>\n' + 
  '<meta http-equiv="Content-Type" content="text/html; charset=big5">\n</HEAD>' +
    '<BODY BGCOLOR=white TEXT=BLACK"><font color=#000000>');
  docObj.writeln('Search Query: <I>' + document.search.query.value + '</I><BR>\n' +
/* original code, used in frames
  docObj.writeln('Search Query: <I>' + parent.command.document.search.query.value + '</I><BR>\n' +
*/
    'Search Results: <I>' + (reference + 1) + ' - ' +
    currentRecord + ' of ' + results.length + '</I><br />' +
    '\n\n<!-- Begin result set //-->\n\n\t<ol>');
  if (searchType == SEARCHURL) {
    for (var i = reference; i < currentRecord; i++) {
//      var divide = results[i].split("|");
      docObj.writeln('\t<li>' + results[i] + '</li><P />\n');
      }
    }
  else {
//    docObj.writeln('findbook.length = ' + findbook.length + ' <br /> \n');

      
    for (var i = reference; i < currentRecord; i++) {
//      var divide = results[i].split('|');
      var oneline = results[i].substring(results[i].indexOf(" "), results[i].length);
      var temp = results[i].substring(0, results[i].indexOf(" "));
      docObj.writeln('<li>' + '<font color="blue">' + temp + '</font>' + oneline + '</li>\n');
/* original
      docObj.writeln('<li><a href="" onClick="parent.command.readchapter(' + findbook[i]+ ', ' + findchapter[i]+ '); return false;">' + temp + '</a> ' + oneline + '</li>\n');
*/
//      docObj.writeln('\t<li>' + oneline + '</li><P />\n');
      }
    }
  docObj.writeln('\n\t</ol>\n\n<!-- End result set //-->\n\n');
//  prevNextResults(results.length, reference, offset);
//  docObj.writeln('<HR NOSHADE WIDTH=100%>' +
  docObj.writeln('\n</font>\n</BODY>\n</HTML>');
  docObj.close();
//  document.search.query.select();
  }

// Define a function to dynamically display Prev and Next buttons
function prevNextResults(ceiling, reference, offset) {
  docObj.writeln('<CENTER><FORM>');
  if(reference > 0) {
    docObj.writeln('<INPUT TYPE=BUTTON VALUE="Prev ' + offset + ' Results" ' +
      'onClick="parent.command.formatResults(parent.command.copyArray, ' +
      (reference - offset) + ', ' + offset + ')">');
    }
  if(reference >= 0 && reference + offset < ceiling) {
    var trueTop = ((ceiling - (offset + reference) < offset) ? ceiling - (reference + offset) : offset);
    var howMany = (trueTop > 1 ? "s" : "");
    docObj.writeln('<INPUT TYPE=BUTTON VALUE="Next ' + trueTop + ' Result' + howMany + '" ' +
      'onClick="parent.command.formatResults(parent.command.copyArray, ' +
      (reference + offset) + ', ' + offset + ')">');
    }
  docObj.writeln('</CENTER>');
  }