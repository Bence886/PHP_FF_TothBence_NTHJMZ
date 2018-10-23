# Tóth Bence NTHJMZ
## Tree nursery

![alt text](https://github.com/Bence886/PHP_FF_TothBence_NTHJMZ/blob/master/docs/db_tables.png)

Tables:
 * **tree** (*tree_id*, *environment_id*, *type_id*, name, age, resolution, file_name, sketchfab_link)
 * **type** (*type_id*, age, level, name, branching_type, min_branch_num, max_branch_num, growth_len, growth_width, branching_roll, branching_angle, file_name)
 * **environment** (*environment_id*, environment_name, soil_quality, altitude, wind_direction, wind_strength, rainfall, environment_file_name)
 
Az alkalmazás routeja *tree/*  
Az osztályok route-ja a tábla neve.

List of actions (*CRUD*):  
 Create:
 
| Tables        | Path                | Name                    |
| ------------- | ------------------- | ----------------------- |
| tree          | /tree/Create        | treeActionCreate        |
| type          | /type/Create        | typeActionCreate        |
| environment   | /environment/Create | environmentActionCreate |

Read:

| Tables        | Path              | Name                  |
| ------------- | ----------------- | --------------------- |
| tree          | /tree/Read        | treeActionRead        |
| type          | /type/Read        | typeActionRead        |
| environment   | /environment/Read | environmentActionRead |

Update:

| Tables        | Path                 | Name                    |
| ------------- | -------------------- | ----------------------- |
| tree          | /tree/Update         | treeActionUpdate        |
| type          | /type/Update         | typeActionUpdate        |
| environment   | /environment/Update  | environmentActionUpdate |

Delete:

| Tables        | Path                 | Name                    |
| ------------- | -------------------- | ----------------------- |
| tree          | /tree/Delete         | treeActionDelete        |
| type          | /type/Delete         | typeActionDelete        |
| environment   | /environment/Delete  | environmentActionDelete |

> https://sketchfab.com
