define({ "api": [
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p>"
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "./doc/main.js",
    "group": "_home_guangzheng_www_virtual_api_doc_main_js",
    "groupTitle": "_home_guangzheng_www_virtual_api_doc_main_js",
    "name": ""
  },
  {
    "type": "post",
    "url": "test/test1/index",
    "title": "添加用户接口",
    "description": "<p>添加用户,完成...,并...,最后...</p>",
    "group": "test",
    "name": "test_test1_index_post",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "phone",
            "description": "<p>手机号</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": true,
            "field": "assert",
            "defaultValue": "0",
            "description": "<p>断言，根据断言返回不同的预期值，真实接口不需要</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "status",
            "description": "<p>接口是否调用成功的标识,1为成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "state",
            "description": "<p>业务处理结果,1为成功</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "primaryKey",
            "description": "<p>自增ID</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "成功的响应:",
          "content": "{\n  \"state\": 1,\n  \"status\": 1,\n  \"message\": \"添加成功\",//提示元\n  \"primaryKey\": 10 //用户添加成功后的主键\n}",
          "type": "Object"
        }
      ]
    },
    "error": {
      "fields": {
        "Error  200": [
          {
            "group": "Error  200",
            "type": "Integer",
            "optional": false,
            "field": "status",
            "description": "<p>不等于1,表示接口调用失败</p>"
          },
          {
            "group": "Error  200",
            "type": "Integer",
            "optional": false,
            "field": "state",
            "description": "<p>不等于1,表示业务结果处理失败</p>"
          },
          {
            "group": "Error  200",
            "type": "Integer",
            "optional": false,
            "field": "state-0",
            "description": "<p>参数错误</p>"
          },
          {
            "group": "Error  200",
            "type": "Integer",
            "optional": false,
            "field": "state-3",
            "description": "<p>用户已存在</p>"
          },
          {
            "group": "Error  200",
            "type": "Integer",
            "optional": false,
            "field": "state-4",
            "description": "<p>手机号码已存在</p>"
          },
          {
            "group": "Error  200",
            "type": "Integer",
            "optional": false,
            "field": "state-5",
            "description": "<p>添加失败</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "失败的响应，例如:",
          "content": "HTTP/1.1 200 OK\nobject(stdClass)#1 (3) {\n    [\"status\"]=> int(0)\n    [\"state\"]=> int(0)\n    [\"error\"]=> \"参数错误\"\n}",
          "type": "Object"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "./application/controllers/test/test1.php",
    "groupTitle": "test",
    "sampleRequest": [
      {
        "url": "http://192.168.9.141:8007/index.php/test/test1/index"
      }
    ]
  }
] });
