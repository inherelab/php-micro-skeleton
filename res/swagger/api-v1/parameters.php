<?php
/**
 * @use define some common params
 *
 * @SWG\Parameter(
 *      parameter="page_index_in_query",
 *      name="pageIndex",
 *      description="The page index, default is `1`",
 *      type="integer",
 *      format="int32",
 *      default="1",
 *      in="query"
 * )
 * @SWG\Parameter(
 *      parameter="page_size_in_query",
 *      name="pageSize",
 *      description="The page size number, default is `20`",
 *      type="integer",
 *      format="int32",
 *      default="20",
 *      in="query"
 * )
 * @SWG\Parameter(
 *      parameter="data_start_in_query",
 *      name="start",
 *      description="The data start index, default is `0`",
 *      type="integer",
 *      format="int32",
 *      default="0",
 *      in="query"
 * )
 * @SWG\Parameter(
 *      parameter="data_limit_in_query",
 *      name="limit",
 *      description="The data limit number, default is `20`",
 *      type="integer",
 *      format="int32",
 *      default="20",
 *      in="query"
 * )
 * @SWG\Parameter(
 *      parameter="api_version_in_query",
 *      name="version",
 *      description="The API version, default is `1.0.0`",
 *      type="string",
 *      format="string",
 *      default="1.0.0",
 *      in="query"
 * )
 * @SWG\Parameter(
 *      parameter="id_in_path",
 *      in="path",
 *      name="id",
 *      type="integer",
 *      format="int64",
 *      required=true,
 *      description="The ID number value"
 * )
 * @SWG\Parameter(
 *      parameter="user_id_in_path",
 *      in="path",
 *      name="id",
 *      type="integer",
 *      format="int64",
 *      required=true,
 *      description="The user ID number value(IN PATH)"
 * )
 * @SWG\Parameter(
 *      parameter="user_id_in_query",
 *      in="query",
 *      name="userId",
 *      type="integer",
 *      format="int64",
 *      default="0",
 *      required=true,
 *      description="The logged user ID number(IN QUERY)"
 * )
 * @SWG\Parameter(
 *      parameter="fields_in_query",
 *      in="query",
 *      name="fields",
 *      type="string",
 *      default="*",
 *      format="string",
 *      description="The needed fields, multiple use of `,` separated. default is `*`, return all field"
 * )
 *
 */
