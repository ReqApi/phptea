# PHPTeA
### a PHP TExt Adventure engine

## What's this all about?
[ ReqApi | http://github.com/ReqApi ] is improving her PHP skills. She is doing this by writing a game engine for command line text adventures from scratch. The engine will be relatively generic in terms of what type of game it can be used to make. It will however, likely be used to make a specific game when it is done.

## What will the engine support?
The engine will use a number of functions & objects to allow the game writer to focus on story & game mechanics without writing a great deal of procedural code. This will include:
- A command interpreter, which works out what the user is trying to do, and which items they are referencing. The syntax will be relatively flexible, with support for different command lengths and synonymous command words (e.g. kick/attack/stab could be interpreted as the same command).
- A command line interaction object, simplifying the user & the game's interaction with the command line. Supports basic output and input, control over line spacing, prompt outputs. Adds a small delay to improve game flow. The delay might dynamically change depending on the length of the output just printed, for ease of reading. This delay might be adjustable in user settings for accessibility reasons.
- Classes that allow the easy constuction of game elements.
    * Character: Can be extended to a player object, and NPC objects. Attribtes such as items carried, name, hitpoints, etc.
    * Room: Representing different physical areas in the game universe. Attributes include characters present, items present,          entrances, exits, obstacles, etc.
    * Item: Any item in the game. A puzzle related item, a weapon, a piece of clothing, a potion, etc. Attributes include which        other items it can interact with (and the result of that interaction), whether it can be weilded, what kind of combat            statistics it might have.
    * Path: The thing that ties all the rooms together in a certain order. Rooms can be constructed & placed along the path for        the player to explore. They do not have to be in a linear order, the path will be able to branch. Dynamic path generation        should be supported (E.g. Adding an arbitrary number of randomised dungeon rooms during runtime and then removing them from       the active path when the player has cleared them.)
- Saving functionality utilising a MySQL database. The specification for this will be decided in more detail later on.
