function doGet(e) {
  return HtmlService.createTemplateFromFile('index.html')
    .evaluate().setTitle('displayforscreen Window')
    .addMetaTag('viewport', 'width=device-width, initial-scale=1')
}

function getRange()
{
 let ss =  SpreadsheetApp.getActive()
 let h_data_str = "";

 ss.getRange("A1:D1").getValues().forEach(h=>{
    h_data_str += h;
 })

  let h_data_J = JSON.stringify(h_data_str.split(',') );



  let b_data = JSON.stringify(ss.getRange("A2:D51").getValues() );


  return  [h_data_J, b_data];
}
