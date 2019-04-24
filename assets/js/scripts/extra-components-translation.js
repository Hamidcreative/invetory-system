/*
* Translation - Extra Components
*/
$(document).ready(function () {
  $(function () {
    switchLanguage();
    /**** Automatic Language Translation ****/
    function switchLanguage() {
      var select = $('.select-wrapper');
      var options = $('.select-wrapper input.dropdown-trigger');

      // Create Dictionary

      var dict = {
        "Hey, I am John Doe.": {
          en: "Hey, I am John Doe.",
          ch: '嘿，我是李四。',
          es: "Hola, me llamo John",
          fr: 'Bonjour, mon nom est John'
        },
        "Buy coffee now": {
          en: "Buy coffee now",
          ch: '现在购买咖啡',
          es: "Comprar ahorra",
          fr: "Acheter maintenant"
        },
        "Register new task": {
          en: "Register new task",
          ch: '注册新任务',
          es: "Registrarse gratis",
          fr: "M'inscrire gratuitement"
        },
        "Save your item and publish": {
          en: "Save your iteam and publish",
          ch: '保存ITEM并发布',
          es: "Guardar y publicar",
          fr: "Enregistrer et publier"
        },
        "Create article": {
          en: "Create article",
          ch: '创建文章',
          es: "Crear un nuevo artículo",
          fr: "Créer un nouvel article"
        }
      }

      // Change to selected language

      select.on('change', function () {
        if (options.val() == 'English') {
          var translator = $('body').translate({ lang: 'en', t: dict })
          translator.lang('en')
          translator.get('Hey, I am John Doe.', 'Buy coffee now', 'Register new task', 'Save your iteam and publish', 'Create article')

        }

        else if (options.val() == 'Chinese') {
          var translator = $('body').translate({ lang: 'en', t: dict })
          translator.lang('ch')
          translator.get('Hey, I am John Doe.', 'Buy coffee now', 'Register new task', 'Save your item and publish', 'Create article')

        }

        else if (options.val() == 'Spanish') {
          var translator = $('body').translate({ lang: 'en', t: dict })
          translator.lang('es')
          translator.get('Hey, I am John Doe.', 'Buy coffee now', 'Register new task', 'Save your iteam and publish', 'Create article')

        }

        else if (options.val() == 'French') {
          var translator = $('body').translate({ lang: 'en', t: dict })
          translator.lang('fr')
          translator.get('Hey, I am John Doe.', 'Buy coffee now', 'Register new task', 'Save your iteam and publish', 'Create article')

        }


      })

    }
  });
})