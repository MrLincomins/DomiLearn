import telebot
import  random
from telebot import types

bot = telebot.TeleBot('6501787932:AAEm7ZlARRSuLJbnkgjE5zSMjqrqNt2Qpiw')


@bot.message_handler(commands=['start'])
def start(message):
    bot.reply_to(message, 'Привет! Ты находишься в чат боте, в котором ты сможешь посмотреть свои оценки.', reply_markup = New_Markup())
def New_Markup():
    markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
    btn_login = types.KeyboardButton("Войти в аккаунт")
    markup.add(btn_login)
    return markup


@bot.message_handler(content_types=['text'])
def login(message):
    if message.text == 'Войти в аккаунт':
        bot.send_message(message.chat.id, 'Если вы хотите войти в аккаунт, то введите свой логин.')
        bot.register_next_step_handler(message, PASSWORD)


def PASSWORD(message):
    login = message.text
    print(login)
    bot.send_message(message.chat.id, 'Теперь введите пароль')
    bot.register_next_step_handler(message, sign_in)
@bot.message_handler(content_types=['text'])
def sign_in(message):
    password = message.text
    print(password)
    a = types.ReplyKeyboardRemove()
    bot.send_message(message.chat.id, "Вы находитесь в главном меню", reply_markup=a)
    b = types.ReplyKeyboardMarkup()
    btn_diary = types.KeyboardButton('Дневник')
    btn_grades_list = types.KeyboardButton('Табель успеваемости')
    btn_news = types.KeyboardButton('Новости')
    b.add(btn_diary, btn_grades_list, btn_news)
    bot.register_next_step_handler(message, choice)
    bot.send_message(message.chat.id, 'Выберите что вы хотите посмотреть:', reply_markup=b)

def choice(message):
    if message.text == "Табель успеваемости":
        average_score = []
        list_of_items = {
            "Математика": 5.00,
            "Русский язык": 3.65,
            "Физика": 4.95,
            "Информатика": 5.00,
            "Литература": 4.05,
            "География": 4.76,
            "Биология": 4.52,
            "История":  4.30,
            "Обществознание": 4.69,
            "Английский язык": 4.47,
            "Физкультура": 5.00
        }
        bot.send_message(message.chat.id, 'Ваш средний балл по всем предметам')
        for name, score in list_of_items.items():
            bot.send_message(message.chat.id, f'{name} - {score}')
            average_score.append(score)
        total_score = sum(average_score)/len(average_score)
        bot.send_message(message.chat.id, f'Ваш средний балл относительно всех предметов: {round(total_score, 2)}')
        bot.register_next_step_handler(message, choice)
    elif message.text == "Новости":
        bot.send_message(message.chat.id, 'Последние новости за день:')
        bot.send_message(message.chat.id, 'В нашей школе начался сбор макулатуры.')
        bot.send_message(message.chat.id, 'Пройдёт сбор с 19 по 21 сентября.')
        bot.register_next_step_handler(message, choice)
    elif message.text == "Дневник":
        c = types.ReplyKeyboardRemove()
        bot.send_message(message.chat.id, 'Вы перешли в дневник', reply_markup=c)
        d = types.ReplyKeyboardMarkup()
        btn_1 = types.KeyboardButton('Понедельник')
        btn_2 = types.KeyboardButton('Вторник')
        btn_3 = types.KeyboardButton('Среда')
        btn_4 = types.KeyboardButton('Четверг')
        btn_5 = types.KeyboardButton('Пятница')
        btn_6 = types.KeyboardButton('Суббота')
        btn_left = types.KeyboardButton('Назад')
        d.add(btn_1, btn_2, btn_3, btn_4, btn_5, btn_6, btn_left)
        bot.send_message(message.chat.id,'Выберите день недели, чтобы узнать что вам задали и что вы получили за этот день', reply_markup=d)

        bot.register_next_step_handler(message, days)




def diary(message):
    if message.text == 'Дневник':
        c = types.ReplyKeyboardRemove()
        bot.send_message(message.chat.id, 'Вы перешли в дневник', reply_markup=c)
        d = types.ReplyKeyboardMarkup()
        btn_1 = types.KeyboardButton('Понедельник')
        btn_2 = types.KeyboardButton('Вторник')
        btn_3 = types.KeyboardButton('Среда')
        btn_4 = types.KeyboardButton('Четверг')
        btn_5 = types.KeyboardButton('Пятница')
        btn_6 = types.KeyboardButton('Суббота')
        btn_left = types.KeyboardButton('Назад')
        d.add(btn_1, btn_2, btn_3, btn_4, btn_5, btn_6, btn_left)
        bot.send_message(message.chat.id, 'Выберите день недели, чтобы узнать что вам задали и что вы получили за этот день', reply_markup=d)

        bot.register_next_step_handler(message, days)
def days(message):
    schedule1 = {
        "Понедельник": {
            "Математика": {
                "Домашнее задание": "Решить задачи 1-5 на странице 10",
                "Оценка": 4
            },
            "Русский язык": {
                "Домашнее задание": "Написать сочинение на тему 'Моя любимая книга'",
                "Оценка": 5
            },
            "Литература": {
                "Домашнее задание": " Прочитать. стр 17-32",
                "Оценка": 5
            },
            "Английский язык": {
                "Домашнее задание": "выучить текст на пересказ на странице 19",
                "Оценка": 5
            },
            "География": {
                "Домашнее задание": "Принести атлас",
                "Оценка": 5
            },
            "Физика": {
                "Домашнее задание": "стр9 № 5-9",
                "Оценка": 5
            },
            "Физкультура": {
                "Домашнее задание": "~",
                "Оценка": 5
            }
        }
    }
    schedule2 = {
        "Вторник": {
            "Математика": {
                "Домашнее задание": "Решить задачи 2-4 на странице 13",
                "Оценка": 5
            },
            "Русский язык": {
                "Домашнее задание": "Подготовится к словарному диктанту.",
                "Оценка": 3
            },
            "Литература": {
                "Домашнее задание": "Выучить стих",
                "Оценка": 5
            },
            "Английский язык": {
                "Домашнее задание": "Перевести слова на стр 23",
                "Оценка": 4
            },
            "География": {
                "Домашнее задание": "~",
                "Оценка": 5
            },
            "Физика": {
                "Домашнее задание": "стр11 № 3-6",
                "Оценка": 5
            },
            "История": {
                "Домашнее задание": "Запомнить все даты к тесту",
                "Оценка": 4
            }
        }
    }
    schedule3 = {
        "Среда": {
            "Математика": {
                "Домашнее задание": "Решить задачи 4-8 на странице 20",
                "Оценка": 5
            },
            "Русский язык": {
                "Домашнее задание": "~",
                "Оценка": 3
            },
            "Обществознание": {
                "Домашнее задание": "Прочитать параграф 5",
                "Оценка": 4
            },
            "Английский язык": {
                "Домашнее задание": "~",
                "Оценка": 5
            },
            "География": {
                "Домашнее задание": "Принести контурную карту",
                "Оценка": 5
            },
            "Физика": {
                "Домашнее задание": "Прочитать параграф 6",
                "Оценка": 5
            },
            "Физкультура": {
                "Домашнее задание": "~",
                "Оценка": 5
            }
        }
    }
    schedule4 = {
        "Четверг": {
            "Математика": {
                "Домашнее задание": "Запомнить теорему Пифагора и решить задачи 3-6 на стр 19",
                "Оценка": 5
            },
            "Физкультура": {
                "Домашнее задание": "",
                "Оценка": 5
            },
            "Обществознание": {
                "Домашнее задание": " Прочитать 'Слово о полку Игореве",
                "Оценка": 5
            },
            "История": {
                "Домашнее задание": "Выучить на пересказ параграф 4",
                "Оценка": 5
            },
            "Биология": {
                "Домашнее задание": "~",
                "Оценка": 5
            },
            "Физика": {
                "Домашнее задание": "стр25 1-5",
                "Оценка": 4
            },
            "Английский язык": {
                "Домашнее задание": "~",
                "Оценка": 4
            }
        }
    }
    schedule5 = {
        "Пятница": {
            "Физика": {
                "Домашнее задание": "Выписать все формулы на странице 26",
                "Оценка": 4
            },
            "Русский язык": {
                "Домашнее задание": "~",
                "Оценка": 5
            },
            "Математика": {
                "Домашнее задание": "Параграф 9, учить",
                "Оценка": 5
            },
            "Английский язык": {
                "Домашнее задание": "выучить текст на пересказ на странице 19",
                "Оценка": 5
            },
            "География": {
                "Домашнее задание": "Принести атлас",
                "Оценка": 5
            },
            "Физкультура": {
                "Домашнее задание": "~",
                "Оценка": 5
            },
            "Литература": {
                "Домашнее задание": "~",
                "Оценка": 5
            }
        }
    }
    schedule6 = {
        "Суббота": {
            "Биология": {
                "Домашнее задание": "Параграф 6, читать",
                "Оценка": 4
            },
            "Русский язык": {
                "Домашнее задание": "~",
                "Оценка": 3
            },
            "Обществознание": {
                "Домашнее задание": "Выучить все пункты на параграфе 10",
                "Оценка": 5
            },
            "Английский язык": {
                "Домашнее задание": "Перевести и выучить слова на странице 29",
                "Оценка": 5
            },
            "География": {
                "Домашнее задание": "Принести контурную карту",
                "Оценка": 5
            },
            "История": {
                "Домашнее задание": "Параграф 10",
                "Оценка": 5
            },
            "Физкультура": {
                "Домашнее задание": "~",
                "Оценка": 5
            }
        }
    }
    if message.text == "Понедельник":
        for day, subjects in schedule1.items():
            bot.send_message(message.chat.id, f"Расписание на {day}:")
        for subject, details in subjects.items():
            homework = details["Домашнее задание"]
            grade = details["Оценка"]
            bot.send_message(message.chat.id,f"Предмет: {subject}, \n Домашнее задание: {homework}, \n Оценка: {grade}")
        bot.register_next_step_handler(message, days)
    elif message.text == "Вторник":
        for day, subjects in schedule2.items():
            bot.send_message(message.chat.id, f"Расписание на {day}:")
        for subject, details in subjects.items():
            homework = details["Домашнее задание"]
            grade = details["Оценка"]
            bot.send_message(message.chat.id,f"Предмет: {subject}, \n Домашнее задание: {homework}, \n Оценка: {grade}")
        bot.register_next_step_handler(message, days)
    elif message.text == "Среда":
        for day, subjects in schedule3.items():
            bot.send_message(message.chat.id, f"Расписание на {day}:")
        for subject, details in subjects.items():
            homework = details["Домашнее задание"]
            grade = details["Оценка"]
            bot.send_message(message.chat.id,f"Предмет: {subject}, \n Домашнее задание: {homework}, \n Оценка: {grade}")
        bot.register_next_step_handler(message, days)

    elif message.text == "Четверг":
        for day, subjects in schedule4.items():
            bot.send_message(message.chat.id, f"Расписание на {day}:")
        for subject, details in subjects.items():
            homework = details["Домашнее задание"]
            grade = details["Оценка"]
            bot.send_message(message.chat.id,f"Предмет: {subject}, \n Домашнее задание: {homework}, \n Оценка: {grade}")
        bot.register_next_step_handler(message, days)

    elif message.text == "Пятница":
        for day, subjects in schedule5.items():
            bot.send_message(message.chat.id, f"Расписание на {day}:")
        for subject, details in subjects.items():
            homework = details["Домашнее задание"]
            grade = details["Оценка"]
            bot.send_message(message.chat.id,f"Предмет: {subject}, \n Домашнее задание: {homework}, \n Оценка: {grade}")
        bot.register_next_step_handler(message, days)
    elif message.text == "Суббота":
        for day, subjects in schedule6.items():
            bot.send_message(message.chat.id, f"Расписание на {day}:")
        for subject, details in subjects.items():
            homework = details["Домашнее задание"]
            grade = details["Оценка"]
            bot.send_message(message.chat.id,f"Предмет: {subject}, \n Домашнее задание: {homework}, \n Оценка: {grade}")
        bot.register_next_step_handler(message, days)
    elif message.text == "Назад":
        d = types.ReplyKeyboardRemove()
        bot.send_message(message.chat.id, "Вы вернулись в главное меню", reply_markup=d)
        j = types.ReplyKeyboardMarkup()
        btn_diary = types.KeyboardButton('Дневник')
        btn_grades_list = types.KeyboardButton('Табель успеваемости')
        btn_news = types.KeyboardButton('Новости')
        j.add(btn_diary, btn_grades_list, btn_news)
        bot.send_message(message.chat.id, "Выберите что вы хотите посмотреть", reply_markup=j)
        bot.register_next_step_handler(message, choice)





bot.polling(none_stop=True)

