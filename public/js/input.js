$(".inputfile").on("change", function (e) {
   var fileName = "";

   if (this.files && this.files.length > 1)
      if (this.files.length <= 12) {
         fileName = (this.getAttribute("data-multiple-caption") || "").replace(
            "{count}",
            this.files.length
         );
         $("#inputFileSubmit").prop("disabled", false);
      } else {
         fileName = '<span style="color:red">Maksymalnie 12 zdjęć</span>';
         $("#inputFileSubmit").prop("disabled", true);
      }
   else if (e.target.value)
   {
      fileName = e.target.value.split("\\").pop();
      $("#inputFileSubmit").prop("disabled", false);
   }

   if (fileName)
   { 
      $("#fileLabel").html(fileName);
   } else {
      $("#fileLabel").html('Kliknij aby wybrać zdjęcia');
   }
});
