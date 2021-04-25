function restoreMyCSS(obj) {
  obj.each(function() {  // chamando jQuery por objeto JS
    if (obj.is(":even")) {
      obj.css("background-color", "#ffffff");
    }
    if (obj.is(":odd")) {
      obj.css("background-color", "#f2f2f2");
    }
  });
}

$(function () {
  $("td").dblclick(function () {
    var conteudoOriginal = $(this).text();

    $(this).addClass("celulaEmEdicao");
    $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
    $(this).children().first().focus();

    $(this).children().first().keypress(function (e) {
      if (e.which == 13) {
        var novoConteudo = $(this).val();
        $(this).parent().text(novoConteudo);
        $(this).parent().removeClass("celulaEmEdicao");
        restoreMyCSS($(this).parent());  // Chamada para restaurar CSS inicial
      }
    });

	$(this).children().first().blur(function() {
	  $(this).parent().text(conteudoOriginal);
      $(this).parent().removeClass("celulaEmEdicao");
      restoreMyCSS($(this).parent());  // Chamada para restaurar CSS inicial
	});
  });
	
  // Aplicando e restaurando CSS por hover
  $("tr:has(td)").hover(function() {
    $(this).css("background-color","");
    $(this).toggleClass('colorir');
  }, function(){
    $(this).removeClass('colorir');
    restoreMyCSS($(this));  // Chamada para restaurar CSS inicial
  });
	
  // Aplicando CSS no loading
  $("tr:nth-child(odd)").css("background-color", "#ffffff");
  $("tr:nth-child(even)").css("background-color", "#f2f2f2");
});
