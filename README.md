# Teste UDS David Richard

## Routas
### get
/api/sizer
#### return
` {
        "id": 1,
        "description": "pequena",
        "size": "p",
        "value": 20,
        "preparation_time": 15,
        "created_at": null,
        "updated_at": null
    }
    `
### get
/api/flavor/
### return
`
{
        "id": 1,
        "description": "calabresa",
        "additional_time": 0,
        "created_at": null,
        "updated_at": null
    },
` 
### get
/api/order/{id}
### return
`
{
    "id": 1,
    "size": "pequena",
    "flavor": "calabresa",
    "preparation_time": 50,
    "total_pay": "76",
    "created_at": "2019-03-15 17:07:31",
    "updated_at": "2019-03-15 20:00:42"
}
`
### get
/api/additional

### return
`{        "id": 1,
        "description": "extra bacon",
        "value": "3",
        "additional_time": 0,
        "created_at": null,
        } `

### post
/api/order/save
### campos obrigatorio
`{
    'size' : {id size},
    'flavor' : {id flavor}
}`
### return 
`
{
    "size": "pequena",
    "flavor": "calabresa",
    "preparation_time": 15,
    "total_pay": 20,
    "updated_at": "2019-03-16 14:50:00",
    "created_at": "2019-03-16 14:50:00",
    "id": 4
}`

### post
/api/order/{id_order}/additional
### campos obrigatorios
`
{additional_id} : {id additional}
`
### return
`{
    "headers": {},
    "original": {
        "id": 1,
        "size": "pequena",
        "flavor": "calabresa",
        "preparation_time": 50,
        "total_pay": "76",
        "created_at": "2019-03-15 17:07:31",
        "updated_at": "2019-03-15 20:00:42",
        "additional": [
            {
                "id": 1,
                "description": "extra bacon",
                "value": "3",
                "additional_time": 0,
                "created_at": null,
                "updated_at": null,
                "pivot": {
                    "order_id": 1,
                    "additional_id": 1
                }`
















