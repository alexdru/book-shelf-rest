# Book shelf REST
Some basic REST

## Installation

Step-by-step instructions for starting a project:

**Run docker-compose:**
```bash
docker-compose up
```

**Create `.env` and generate app key:**
```bash
docker exec -it app cp .env.example .env
docker exec -it app php artisan key:generate
```

**Make database migration:**
```bash
docker exec -it app php artisan migrate:fresh --seed
```

**Routes:**
```
/authors/{author} - author REST
/books/{book} - book REST
/books/search - book search with title or description or release_date parameters
```

## License

This project is licensed under the MIT License
