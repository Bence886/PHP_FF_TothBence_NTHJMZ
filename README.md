# Tóth Bence NTHJMZ
## Tree nursery

![alt text](https://github.com/Bence886/PHP_FF_TothBence_NTHJMZ/blob/master/docs/db_tables.png)

Tables:
 * **tree** (*tree_id*, *environment_id*, *type_id*, name, age, resolution, file_name, sketchfab_link)
 * **type** (*type_id*, age, level, name, branching_type, min_branch_num, max_branch_num, growth_len, growth_width, branching_roll, branching_angle, file_name)
 * **environment** (*environment_id*, environment_name, soil_quality, altitude, wind_direction, wind_strength, rainfall, environment_file_name)
 
The routes of the classes are the name of the tables.

List of actions (*CRUD*):  

Read:

| Tables        | Path              | Name                  |
| ------------- | ----------------- | --------------------- |
| tree          | /tree/tree_list        | treeRead        |
| type          | /type/type_list        | typeRead        |
| environment   | /environment/environment_list | environmentnRead |

Update:

Create:

| Tables        | Path                 | Name                    |
| ------------- | -------------------- | ----------------------- |
| tree          | /tree/tree_edit         | treeUpdate        |
| type          | /type/type_edit         | typeUpdate        |
| environment   | /environment/environment_edit  | environmentUpdate |

Delete:

| Tables        | Path                 | Name                    |
| ------------- | -------------------- | ----------------------- |
| tree          | /tree/tree_delete         | treeDelete        |
| type          | /type/type_delete         | typenDelete        |
| environment   | /environment/environment_delete  | environmentDelete |

> https://sketchfab.com
