Приложение реализовано с помощью фреймоврка Laravel, который реализует MVC паттерн

В app/routes/web.php определены пути маршрутов и контроллеры, которые их реализуют.
Основной путь приложения является /companies, вызываемый методом контролера CompanyController index()

Контроллер находится в app/Http/Controllers/CompanyController
Он реализует стандартные CRUD методы(https://laravel.su/docs/8.x/controllers). В методе index() происходит взятие гет параметров и на их основе
происходит пагинация данных. Получение данных происходит с помощью построителя запросов Laravel с его ORM системой.
<br>
Для предприятий также подгружаются все зависимости, во избежания n+1 запроса и реализована фильтрация с помощью пакета Spatie Filtering (https://spatie.be/docs/laravel-query-builder/v5/features/filtering).
With() -  подгружает relation, описанные в моделях, allowedFilters - позволяет фильтровать, AllowedFilter - фильтр, exact() - точечный фильтр по определённому полю, paginate() - пагинация данных.
Фильтрация реализуеются с помощью гетпараметров filter['имя фильтрации']
<br>
Также происходит получение дополнительных данных, для выбора фильтрации - отраслей, налогов
Метод index возвращает view(html страницу) с предприятиями, метод show(), который принимает выбранное предприятие, возвращает карточку предприятия.
<br>
Для всех данных реализованы модели в app/Http/Models (https://laravel.su/docs/8.x/eloquent)
В свойстве модели $fillable описаны поля таблицы, которые возможны для заполнения.
Также реализованы методы отношений, которые делают связь один ко многим с моделью предприятия(https://laravel.su/docs/8.x/eloquent-relationships)
У модели предприятия также реализован аксессор -getAllTaxAttribute, который при обращении к all_tax даст общие затраты на налоги.

В database/migrations хранятся миграции (https://laravel.su/docs/8.x/migrations), с помощью которых создаются таблицы, делается связь между ними и добавляются новые поля

Представления хранятся в resources/views (https://laravel.su/docs/8.x/blade)
В views созданны необходимые страницы и layouts, которые отображаются с помощью контроллеров.
<br>
Blade шаблоны используют переменные, которые передаются в контроллере и bootstrap 5.0(https://bootstrap5.ru/) для реализации frontend.
В company.blade.php реализована необходимая сетка, а так выпадающий список фильтрации. При выборе элемента из списка происходит добавление к ссылке гет параметра соответствующей фильтрации
Ссылка home адресует к методу index() CompanyController


