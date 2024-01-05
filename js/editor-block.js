(function(){
  wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'default',
    label: 'デフォルト',
    isDefault: true,
  } );
  wp.blocks.registerBlockStyle( 'core/heading', {
    name: 'numbered',
    label: '番号付き',
    isDefault: false,
  } );

  wp.blocks.registerBlockStyle( 'core/list', {
    name: 'default',
    label: 'デフォルト',
    isDefault: true,
  } );
  wp.blocks.registerBlockStyle( 'core/list', {
    name: 'checklist',
    label: 'チェックリスト',
    isDefault: false,
  } );
  wp.blocks.registerBlockStyle( 'core/list', {
    name: 'linklist',
    label: 'リンクリスト',
    isDefault: false,
  } );

  wp.blocks.registerBlockStyle( 'core/columns', {
    name: 'col-reverse',
    label: 'カラム(SP：順序反転)',
    isDefault: false,
  } );
})();